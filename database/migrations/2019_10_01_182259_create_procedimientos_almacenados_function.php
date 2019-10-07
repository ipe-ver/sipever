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

            CREATE PROCEDURE `sp_get_articulos`(
                IN id_comienzo INT
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
            SELECT a.id, a.clave, a.descripcion, a.estatus, a.stock_minimo, a.existencias, FORMAT(a.precio_unitario,2) AS precio_unitario, b.descripcion AS descripcion_u_medida, c.nombre as descripcion_cuenta
                FROM cat_articulos a
                INNER JOIN cat_unidades_almacen b ON a.id_unidad = b.id
                INNER JOIN cat_cuentas_contables c ON a.id_cuenta = c.id
                WHERE a.id > id_comienzo
                LIMIT 10;
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
                Select a.id, a.clave, a.descripcion, a.estatus, a.stock_minimo, a.stock_maximo,
                        a.existencias, FORMAT(a.precio_unitario,2) AS precio_unitario, b.nombre as descripcion_cuenta, c.descripcion AS descripcion_u_medida
                from cat_articulos a
                inner join cat_cuentas_contables b on b.id = a.id_cuenta
                inner join cat_unidades_almacen c on c.id = a.id_unidad
                where b.nombre = grupo;
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
                Select a.id, a.clave, a.descripcion, a.estatus, a.stock_minimo,
                        a.existencias, FORMAT(a.precio_unitario,2) AS precio_unitario, b.nombre as descripcion_cuenta, c.descripcion AS descripcion_u_medida
                from cat_articulos a
                INNER JOIN cat_cuentas_contables b ON b.id = a.id_cuenta
                INNER JOIN cat_unidades_almacen c ON c.id = a.id_unidad
                WHERE a.descripcion LIKE CONCAT("%",articulo,"%");
            END
        ');

        /**Procedimiento almacenado para agregar un nuevo artículo.
         * Recibe como parametros: la descripcion, el estatus, la clave, el stock minimo, el stock máximo, las existencias y el precio unitario.
         * Parametros como el grupo y la unidad de medida se proporcionarán con cadenas de caracteres por la selección de los combobox.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_almacenar_artículo
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
                    (SELECT cat_unidades_almacen.id FROM cat_unidades_almacen WHERE cat_unidades_almacen.descripcion LIKE unidad),
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
                IN `stock_minimo` INT,
                IN `unidad` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                UPDATE cat_articulos
                SET descripcion = descripcion, estatus = estatus, existencias = existencias, precio_unitario = precio_unitario,
                stock_minimo=stock_minimo,
                id_cuenta = (SELECT cat_cuentas_contables.id FROM cat_cuentas_contables WHERE cat_cuentas_contables.nombre LIKE grupo),
                id_unidad = (SELECT cat_unidades_almacen.id FROM cat_unidades_almacen WHERE cat_unidades_almacen.descripcion LIKE unidad),
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

        /**Procedimiento almacenado para dar de baja algún artículo.
         * Recibe como parametro la clave del artículo que será dado de baja.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_baja_articulo;

            CREATE PROCEDURE `sp_baja_articulo`(
                IN `clave` INT
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
               UPDATE cat_articulos
               SET estatus = 0, existencias = 0
               WHERE cat_articulos.clave = clave;
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
                INSERT INTO cat_cuentas_contables (cta, scta, sscta, nombre, ctarmo, nomarmo, grupo, estatus, created_at)
                        VALUES (cta, scta, sscta, nombre, ctarmo, nomarmo, grupo, estatus, NOW());
            END
        ');

        /**Procedimiento almacenado para actualizar un grupo (Partida)
         * Recibe los mismo parametros que almacenar solo que no se podrán editar todos los datos. Verificar que datos son editables.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_actualizar_grupo;

            CREATE PROCEDURE `sp_actualizar_grupo`(
                IN `id` INT,
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
                UPDATE cat_cuentas_contables SET cta = cta, scta = scta, sscta = sscta, nombre = nombre, ctarmo = ctarmo,
                         nomarmo = nomarmo, grupo = grupo, estatus = estatus, updated_at = NOW())
                        WHERE cat_cuentas_contables.id = id;
            END
        ');

        /**Procedimiento almacenado para eliminar un grupo (Partida)
         * Este procedimiento dejaría a algunos artículos sin grupo, por lo que se reasignarán a un grupo que se introducirá como parametro.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_eliminar_grupo;

            CREATE PROCEDURE `sp_eliminar_grupo`(
                IN `id` INT,
                IN `nuevo_grupo` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                UPDATE cat_articulos SET id_cuenta =
                (SELECT cat_cuentas_contables.id FROM cat_cuentas_contables WHERE cat_cuentas_contables.nombre LIKE nuevo_grupo), updated_at = NOW()
                WHERE cat_articulos.id_cuenta = id;

                DELETE FROM cat_cuentas_contables
                WHERE cat_cuentas_contables.id = id;
            END
        ');

        /**
         * Procedimiento almacenado para obtener todas las unidades de medida de los artículos
         * de almacén
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_get_unidades;

            CREATE PROCEDURE `sp_get_unidades`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                SELECT * FROM cat_unidades_almacen;
            END
        ');

        /**Procedimiento almacenado para abrir un nuevo periodo
         * No recibe parametros, solo toma la fecha actual
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_abrir_periodo;

            CREATE PROCEDURE `sp_abrir_periodo`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                INSERT INTO periodos (no_mes, anio, estatus) VALUES (MONTH(NOW()), YEAR(NOW()), 1);
            END
        ');

        /**Procedimiento almacenado para el registro del inventario inicial de cada artículo.
         * Todo es automático, algunos datos se actualizarán al cerrar un periodo.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_inventario_inicial;

            CREATE PROCEDURE `sp_inventario_inicial`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                DECLARE i INT DEFAULT 1;
                WHILE i <= (SELECT cat_articulos.id FROM cat_articulos ORDER BY id DESC LIMIT 0, 1) DO
                    INSERT INTO inventario_inicial_final (id_periodo, id_articulo, cant_inicial, existencias, precio_inicial, precio_promedio, estatus, created_at)
                        VALUES (
                            (SELECT periodos.id_periodo FROM periodos WHERE estatus = 1),
                            i,
                            (SELECT cat_articulos.existencias FROM cat_articulos WHERE id = i),
                            0,
                            (SELECT cat_articulos.precio_unitario FROM cat_articulos WHERE id = i),
                            0.0,
                            1,
                            NOW()
                        );
                        SET i = i + 1;
                END WHILE;
            END
        ');

        /**Procedimiento almacenado para cerrar datos del inventario por periodo
         * No recibe parametros.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_inventario_final;

            CREATE PROCEDURE `sp_inventario_final`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                DECLARE id_referencia INT DEFAULT (SELECT periodos.id_periodo 
                    FROM periodos WHERE estatus = 1);

                DECLARE i INT DEFAULT 1;
                
                WHILE i <= (SELECT COUNT(id_periodo) FROM inventario_inicial_final WHERE inventario_inicial_final.id_periodo = id_referencia) DO
                    UPDATE inventario_inicial_final SET inventario_inicial_final.updated_at = NOW(), 
                        inventario_inicial_final.existencias = (SELECT cat_articulos.existencias FROM cat_articulos WHERE cat_articulos.id = 
                            (SELECT inventario_inicial_final.id_articulo FROM inventario_inicial_final WHERE inventario_inicial_final.id_articulo = i 
                            AND inventario_inicial_final.id_periodo = id_referencia)),
                        inventario_inicial_final.estatus = (SELECT cat_articulos.estatus FROM cat_articulos WHERE cat_articulos.id = 
                            (SELECT inventario_inicial_final.id_articulo FROM inventario_inicial_final WHERE inventario_inicial_final.id_articulo = i 
                            AND inventario_inicial_final.id_periodo = id_referencia)),
                        inventario_inicial_final.precio_promedio = (SELECT cat_articulos.precio_unitario FROM cat_articulos WHERE cat_articulos.id = 
                            (SELECT inventario_inicial_final.id_articulo FROM inventario_inicial_final WHERE inventario_inicial_final.id_articulo = i 
                            AND inventario_inicial_final.id_periodo = id_referencia))
                    WHERE inventario_inicial_final.id_articulo = i AND inventario_inicial_final.id_periodo = id_referencia;
                    SET i = i + 1;
                END WHILE;
            END
        ');

        /**Procedimiento almacenado para el loging de las oficinas
         * Solo recibe como parametro el login.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_oficina_login;

            CREATE PROCEDURE `sp_oficina_login`(
                IN `login` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                SELECT * FROM cat_oficinas WHERE cat_oficinas.login LIKE login;
            END
        ');

        /**Procedimiento almacenado para cerrar un periodo.
         * El cierre de un periodo conlleva actualizar la información del inventario, abrir un nuevo periodo y crear nuevos datos para el inventario
         * Referente al nuevo periodo. Se crea una póliza.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_cerrar_periodo;

            CREATE PROCEDURE `sp_cerrar_periodo`()
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                #Aquí debo poner la actualización del inventario, de preferencia debe ser un sp aparte.
                #Aquí debe estar todo el proceso de la póliza, de preferencia lo haré en un sp aparte.
                UPDATE periodos SET estatus = 0 WHERE estatus = 1;
                CALL sp_abrir_periodo;
                CALL sp_inventario_inicial;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_baja_articulo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_get_grupos;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_almacenar_grupo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_actualizar_grupo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_eliminar_grupo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_get_unidades;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_abrir_periodo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_inventario_inicial;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_inventario_final;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_oficina_login;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_cerrar_periodo;');
    }
}
