<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProcedimientosAlmacenadosFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**Procedimiento almacenado para la obtención de todos los artículos en general.
         * No recibe parametros. Se obtienen todos los artículos ordenados por su ID 
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_get_articulos;

            CREATE PROCEDURE `sp_get_articulos`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                Select cat_articulos.id, cat_articulos.clave, cat_articulos.descripcion, cat_articulos.estatus, cat_articulos.stock_minimo, cat_articulos.stock_maximo,
                        cat_articulos.existencias, cat_articulos.precio_unitario, cat_cuentas_contables.nombre as partida, cat_unidades_almacen.descripcion, 
                        cat_unidades_almacen.descripcion_larga
                from cat_articulos 
                inner join cat_cuentas_contables on cat_cuentas_contables.id = cat_articulos.id_cuenta
                inner join cat_unidades_almacen on cat_unidades_almacen.id = cat_articulos.id_unidad
                ORDER BY cat_articulos.id ASC;
            END
        ');

        /**Procedimiento almacenado para la obtención de todos los artículos de un grupo en específico.    
         * El grupo (Partida) debe ser el nombre del grupo, el nombre se selecciona automáticamente mediante un combobox.
         * Por ejemplo se selecciona la partida 'MATERIAL DE PINTURA', como resultado se obtendrán solo los datos de los artículos de la partida de 'MATERIAL DE PINTURA'
         */    
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_obtener_articulos_grupo;
            CREATE PROCEDURE `sp_obtener_articulos_grupo`(
                IN `grupo` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                Select cat_articulos.id, cat_articulos.clave, cat_articulos.descripcion, cat_articulos.estatus, cat_articulos.stock_minimo, cat_articulos.stock_maximo,
                        cat_articulos.existencias, cat_articulos.precio_unitario, cat_cuentas_contables.nombre as partida, cat_unidades_almacen.descripcion, 
                        cat_unidades_almacen.descripcion_larga
                from cat_articulos 
                inner join cat_cuentas_contables on cat_cuentas_contables.id = cat_articulos.id_cuenta
                inner join cat_unidades_almacen on cat_unidades_almacen.id = cat_articulos.id_unidad
                where cat_cuentas_contables.nombre LIKE grupo;
            END
        ');

        /**Procedimiento almacenado para la obtención de todos los artículos que cumplan con un nombre en específico.
         * El artículo es una cadena de caractéres que servirán para localizar a todos los artículos que tengan dicha cadena.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_buscar_articulo_parametro;
            CREATE PROCEDURE `sp_buscar_articulo_parametro`(
                IN `articulo` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                Select cat_articulos.id, cat_articulos.clave, cat_articulos.descripcion, cat_articulos.estatus, cat_articulos.stock_minimo, cat_articulos.stock_maximo,
                        cat_articulos.existencias, cat_articulos.precio_unitario, cat_cuentas_contables.nombre as partida, cat_unidades_almacen.descripcion, 
                        cat_unidades_almacen.descripcion_larga
                from cat_articulos 
                inner join cat_cuentas_contables on cat_cuentas_contables.id = cat_articulos.id_cuenta
                INNER join cat_unidades_almacen on cat_unidades_almacen.id = cat_articulos.id_unidad
                WHERE cat_articulos.descripcion like concat("%",articulo,"%");
            END
        ');

        /**Procedimiento almacenado para agregar un nuevo artículo.
         * Recibe como parametros: la descripcion, el estatus, la clave, el stock minimo, el stock máximo, las existencias y el precio unitario.
         * Parametros como el grupo y la unidad de medida se proporcionarán con cadenas de caracteres por la selección de los combobox.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_almacenar_artículo;
            CREATE PROCEDURE `sp_almacenar_artículo`(
                IN `clave` INT,
                IN `descripcion` VARCHAR(191),
                IN `estatus` INT,
                IN `stock_minimo` INT,
                IN `stock_maximo` INT,
                IN `existencias` INT,
                IN `precio_unitario` DOUBLE,
                IN `grupo` VARCHAR(191),
                IN `unidad` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                INSERT INTO cat_articulos (clave, fecha_baja, descripcion, estatus, stock_minimo, stock_maximo, existencias, precio_unitario, id_cuenta, id_unidad, created_at) 
                    values (clave, CURDATE(), descripcion, estatus, stock_minimo, stock_maximo, existencias, precio_unitario,
                    (SELECT cat_cuentas_contables.id FROM cat_cuentas_contables WHERE cat_cuentas_contables.nombre LIKE grupo), 
                    (SELECT cat_unidades_almacen.id FROM cat_unidades_almacen WHERE cat_unidades_almacen.descripcion_larga LIKE unidad),
                    NOW());
            END
        ');

        /**Procedimiento almacenado para la actualización de algún artículo.
         * Recibe como parametros los mismos que al agregar uno nuevo, con la exepción de que no todos los campos se podrán editar.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_actualizar_articulo;
            CREATE PROCEDURE `sp_actualizar_articulo`(
                IN `clave` INT,
                IN `descripcion` VARCHAR(191),
                IN `estatus` INT,
                IN `existencias` INT,
                IN `precio_unitario` DOUBLE,
                IN `grupo` VARCHAR(191),
                IN `unidad` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                UPDATE cat_articulos
                SET descripcion = descripcion, estatus = estatus, existencias = existencias, precio_unitario = precio_unitario,
                id_cuenta = (SELECT cat_cuentas_contables.id FROM cat_cuentas_contables WHERE cat_cuentas_contables.nombre LIKE grupo), 
                id_unidad = (SELECT cat_unidades_almacen.id FROM cat_unidades_almacen WHERE cat_unidades_almacen.descripcion_larga LIKE unidad),
                updated_at = NOW()
                WHERE cat_articulos.clave = clave;
            END
        ');

        /**Procedimiento almacenado para la eliminación de algún artículo.
         * Recibe como parametro la clave del artículo que será eliminado.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_eliminar_articulo;

            CREATE PROCEDURE `sp_eliminar_articulo`(
                IN `clave` INT
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                DELETE FROM cat_articulos WHERE cat_articulos.clave = clave;
            END
        ');

        /**Procedimiento almacenado para la obtención de todos los grupos (Partidas)
         * No recibe parametros.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_get_grupos;

            CREATE PROCEDURE `sp_get_grupos`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                SELECT * FROM cat_cuentas_contables;
            END
        ');

        /**Procedimiento almacenado para almacenar un nuevo grupo (Partida)
         * Recibe como parametros: cta, scta, sscta, nombre, ctaarmo, nomarmo, grupo, estatus.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_almacenar_grupo;

            CREATE PROCEDURE `sp_almacenar_grupo`(
                IN `cta` CHAR(4),
                IN `scta` CHAR(4),
                IN `sscta` CHAR(4),
                IN `nombre` VARCHAR(191),
                IN `ctaarmo` VARCHAR(191),
                IN `nomarmo` VARCHAR(191),
                IN `grupo` CHAR(1),
                IN `estatus` INT
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                INSERT INTO cat_cuentas_contables ()
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_get_articulos;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_obtener_articulos_grupo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_buscar_articulo_parametro;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_almacenar_artículo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_actualizar_articulo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_eliminar_articulo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_get_grupos;');
    }
}
