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
                INSERT INTO cat_cuentas_contables (cta, scta, sscta, nombre, ctaarmo, nomarmo, grupo, estatus, created_at)
                        VALUES (cta, scta, sscta, nombre, ctaarmo, nomarmo, grupo, estatus, NOW());
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
                UPDATE cat_cuentas_contables SET cta = cta, scta = scta, sscta = sscta, nombre = nombre, ctaarmo = ctaarmo,
                         nomarmo = nomarmo, grupo = grupo, estatus = estatus, updated_at = NOW()
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
                    UPDATE inventario_inicial_final as t1 INNER JOIN cat_articulos ON t1.id_articulo = cat_articulos.id SET t1.updated_at = NOW(), 
                        t1.existencias = cat_articulos.existencias, 
                        t1.estatus = cat_articulos.estatus,
                        t1.precio_promedio = cat_articulos.precio_unitario
                    WHERE t1.id_periodo = id_referencia AND cat_articulos.id = i;
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

        /**Procedimiento almacenado para la población de una poliza y edición de las compras y consumos del mismo periodo.
         * Aun no se sabe que parametros podría recibir.
         * Está incompleto.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_generar_poliza;

            CREATE PROCEDURE `sp_generar_poliza`(
                IN `poliza` INT,
                IN `numero_poliza` INT,
                IN `estatus` INT
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                INSERT INTO polizas (id_periodo, poliza, numero_poliza, estatus, created_at)
                    VALUES ((SELECT periodos.id_periodo FROM periodos WHERE periodos.estatus = 1), poliza, numero_poliza, estatus, NOW());
                
                UPDATE consumos SET consumos.id_poliza = 
                    (SELECT polizas.id_poliza FROM polizas WHERE polizas.id_periodo = 
                    (SELECT periodos.id_periodo FROM periodos WHERE periodos.estatus = 1)), 
                    updated_at = NOW()
                WHERE consumos.id_periodo = (SELECT periodos.id_periodo FROM periodos WHERE periodos.estatus = 1);
                    
                UPDATE compras SET compras.id_poliza = 
                    (SELECT polizas.id_poliza FROM polizas WHERE polizas.id_periodo = 
                    (SELECT periodos.id_periodo FROM periodos WHERE periodos.estatus = 1)), 
                    updated_at = NOW()
                WHERE compras.id_periodo = (SELECT periodos.id_periodo FROM periodos WHERE periodos.estatus = 1);
            END
        ');

        /**Procedimiento almacenado para obtener datos de los artículos de cierto grupo.
         * Recibe como parametro el periodo en mes y año y el nombre del grupo.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_inventario_grupo;

            CREATE PROCEDURE `sp_inventario_grupo`(
                IN `anio` INT,
                IN `mes` INT,
                IN `grupo` VARCHAR(191)
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                SELECT cuenta.nombre as grupo, articulo.descripcion as descripcion, inventario.cant_inicial as cantidad_inicial,
                    inventario.existencias as existencias_actuales, periodo.no_mes as mes, periodo.anio as anio 
                FROM inventario_inicial_final inventario 
                INNER JOIN cat_articulos articulo ON inventario.id_articulo = articulo.id
                INNER JOIN cat_cuentas_contables cuenta ON articulo.id_cuenta = cuenta.id
                INNER JOIN periodos periodo ON inventario.id_periodo = periodo.id_periodo
                WHERE periodo.no_mes = mes AND periodo.anio = anio AND cuenta.nombre = grupo;
            END
        ');

        /**Procedimiento almacenado para cerrar un periodo.
         * El cierre de un periodo conlleva actualizar la información del inventario, abrir un nuevo periodo y crear nuevos datos para el inventario
         * Referente al nuevo periodo. Se crea una póliza.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_cerrar_periodo;

            CREATE PROCEDURE `sp_cerrar_periodo`(
                IN `mes` INT,
                IN `anio` INT
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN

                SELECT IF (mes = MONTH(NOW()) AND anio = YEAR(NOW()),1,0);

                    CALL sp_inventario_final;
                    CALL sp_generar_poliza(1,1234,1);

                    UPDATE periodos SET periodos.estatus = 0 WHERE periodos.no_mes = mes AND periodos.anio = anio;

                    CALL sp_abrir_periodo;
                    CALL sp_inventario_inicial;
                
            END
        ');

        /**Procedimiento almacenado para el registro de una compra de un artículo único que no se dispondrá dentro del catálogo de artículos.
         * Recibe como parametros: mes y año para el periodo, nombre del proveedor, descripción del artículo que se se compró,
         * folio único, fecha de movimiento, número de factura, fecha de facturación, iva del producto, subtotal de la compra,
         * la cantidad que se compró del artículo y el precio unitario por el cual se compró el artículo.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_compra_unica;

            CREATE PROCEDURE `sp_compra_unica`(
                IN `mes` INT,
                IN `anio` INT,
                IN `nombre_proveedor` VARCHAR(191),
                IN `descripcion` VARCHAR(191),
                IN `folio` VARCHAR(191),
                IN `fecha_movimiento` DATE,
                IN `no_factura` VARCHAR(191),
                IN `fecha_facturacion` DATE,
                IN `iva` DOUBLE,
                IN `subtotal` DOUBLE,
                
                IN `cantidad` INT,
                IN `precio_unitario` DOUBLE
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                INSERT INTO compras (id_periodo, id_proveedor, descripcion, folio, fecha_movimiento, no_factura, fecha_factura, iva, total, created_at)
                VALUES ((SELECT periodos.id_periodo FROM periodos WHERE periodos.no_mes = mes AND periodos.anio = anio AND estatus = 1), 
                        (SELECT cat_proveedores.id FROM cat_proveedores WHERE cat_proveedores.nombre = nombre_proveedor),
                        descripcion, folio, fecha_movimiento, no_factura, fecha_facturacion, iva, (((iva/100)*subtotal)+subtotal), NOW());

                INSERT INTO detalles (id_compra, tipo_movimiento, cantidad, precio_unitario, subtotal, created_at) 
                VALUES ((SELECT compras.id_compra FROM compras WHERE compras.folio = folio), 2, cantidad, precio_unitario, subtotal, NOW());
            END
        ');

        /**Procedimiento almacenado para el registro de una compra por artículo que esté dentro del almacén.
         * Este procedimiento afecta directamente a las existencias del artículo en el catálogo de artículos y modifica su precio conforme a la fórmula de precio promedio.
         * Recibe como parametros: mes y año para el periodo, nombre del proveedor, descripción del artículo que se se compró,
         * folio único, fecha de movimiento, número de factura, fecha de facturación, iva del producto, subtotal de la compra,
         * la cantidad que se compró del artículo y el precio unitario por el cual se compró el artículo.
         */
        DB::unprepared('
            DROP PROCEDURE IF EXISTS sp_compra_almacen;

            CREATE PROCEDURE `sp_compra_almacen`(
                IN `mes` INT,
                IN `anio` INT,
                IN `nombre_proveedor` VARCHAR(191),
                IN `descripcion` VARCHAR(191),
                IN `folio` VARCHAR(191),
                IN `fecha_movimiento` DATE,
                IN `no_factura` VARCHAR(191),
                IN `fecha_facturacion` DATE,
                IN `iva` DOUBLE,
                IN `subtotal` DOUBLE,
                
                IN `cantidad` INT,
                IN `precio_unitario` DOUBLE
            )
            LANGUAGE SQL
            NOT DETERMINISTIC
            CONTAINS SQL
            SQL SECURITY DEFINER
            BEGIN
                INSERT INTO compras (id_periodo, id_proveedor, descripcion, folio, fecha_movimiento, no_factura, fecha_factura, iva, total, created_at)
                VALUES ((SELECT periodos.id_periodo FROM periodos WHERE periodos.no_mes = mes AND periodos.anio = anio AND estatus = 1), 
                        (SELECT cat_proveedores.id FROM cat_proveedores WHERE cat_proveedores.nombre = nombre_proveedor),
                        descripcion, folio, fecha_movimiento, no_factura, fecha_facturacion, iva, (((iva/100)*subtotal)+subtotal), NOW());

                SELECT @i := (SELECT cat_articulos.id FROM cat_articulos WHERE cat_articulos.descripcion = descripcion);
                
                INSERT INTO detalles (id_compra, id_articulo, tipo_movimiento, cantidad, precio_unitario, subtotal, created_at) 
                VALUES ((SELECT compras.id_compra FROM compras WHERE compras.folio = folio), @i, 1, cantidad, precio_unitario, subtotal, NOW());

                SELECT @exis := (SELECT cat_articulos.existencias FROM cat_articulos WHERE cat_articulos.id = @i);
                SELECT @pun := (SELECT cat_articulos.precio_unitario FROM cat_articulos WHERE cat_articulos.id = @i);
                
                UPDATE cat_articulos SET cat_articulos.precio_unitario = (((@exis*@pun)+(cantidad*precio_unitario))/(@exis+cantidad)),cat_articulos.existencias = (@exis+cantidad) WHERE cat_articulos.id = @i;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_generar_poliza;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_inventario_grupo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_cerrar_periodo;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_compra;');
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_factura;');
    }
}
