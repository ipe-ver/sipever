<?php

use Illuminate\Database\Seeder;

use App\Model\Catalogos\Oficina;

class CatOficinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oficinas = array(
			['ubpp' => '6000','oficina'=>'0','descripcion'=>'DIRECCIÓN  GENERAL','subdir'=>'6000','estatus'=>'1'],
            ['ubpp' => '6000','oficina'=>'1','descripcion'=>'OPERADORA DE HOTELES','subdir'=>'6000','estatus'=>'1'],
            ['ubpp' => '6000','oficina'=>'2','descripcion'=>'PRENSA','subdir'=>'6000','estatus'=>'1'],
            ['ubpp' => '6001','oficina'=>'0','descripcion'=>'DEPTO. DE BIENES INMUEBLES','subdir'=>'6000','estatus'=>'1'],
            ['ubpp' => '6003','oficina'=>'0','descripcion'=>'UNIDAD DE GENERO','subdir'=>'6000','estatus'=>'1'],
            ['ubpp' => '6004','oficina'=>'0','descripcion'=>'UNIDAD DE TRANSPARENCIA','subdir'=>'0','estatus'=>'1'],
            ['ubpp' => '6010','oficina'=>'0','descripcion'=>'ÓRGANO INTERNO DE CONTROL','subdir'=>'6010','estatus'=>'1'],
            ['ubpp' => '6020','oficina'=>'0','descripcion'=>'SUBDIRECCIÓN JURÍDICA','subdir'=>'6020','estatus'=>'1'],
            ['ubpp' => '6021','oficina'=>'0','descripcion'=>'DEPTO. DE LO CONTENCIOSO','subdir'=>'6020','estatus'=>'1'],
            ['ubpp' => '6022','oficina'=>'0','descripcion'=>'DEPTO. DE LO CONSULTIVO','subdir'=>'6020','estatus'=>'1'],
            ['ubpp' => '6030','oficina'=>'0','descripcion'=>'SUBDIRECCIÓN ADMINISTRATIVA','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6030','oficina'=>'1','descripcion'=>'PROTECCIÓN CIVIL','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6030','oficina'=>'2','descripcion'=>'S.T.I.P.E.','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6030','oficina'=>'4','descripcion'=>'ORGANIZACIÓN Y MÉTODOS','subdir'=>'0','estatus'=>'1'],
            ['ubpp' => '6030','oficina'=>'5','descripcion'=>'S.U.I.P.E.V.','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6031','oficina'=>'0','descripcion'=>'DEPTO. DE RECURSOS HUMANOS','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6032','oficina'=>'0','descripcion'=>'DEPTO. DE SERVICIOS GENERALES','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6032','oficina'=>'1','descripcion'=>'OFICIALÍA','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6032','oficina'=>'2','descripcion'=>'IMPRESIONES','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6032','oficina'=>'3','descripcion'=>'ARCHIVO GENERAL','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6033','oficina'=>'0','descripcion'=>'DEPTO. DE ADQUISICIONES E INVENTARIOS','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6033','oficina'=>'1','descripcion'=>'ALMACÉN GENERAL','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6034','oficina'=>'0','descripcion'=>'DEPTO. DE TECNOLOGÍAS DE LA INFORMACIÓN','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6035','oficina'=>'0','descripcion'=>'CAFETERÍA IPE','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6038','oficina'=>'0','descripcion'=>'ESTACIONAMIENTO','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6038','oficina'=>'1','descripcion'=>'ESTACIONAMIENTO ISSSTE','subdir'=>'6030','estatus'=>'1'],
            ['ubpp' => '6039','oficina'=>'0','descripcion'=>'CENTRO DE ATENCIÓN INFANTIL( CENDI)','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6040','oficina'=>'0','descripcion'=>'CASA DEL PENSIONADO','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6050','oficina'=>'0','descripcion'=>'SUBDIRECCIÓN DE PRESTACIONES INSTITUCIONALES','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6050','oficina'=>'1','descripcion'=>'ENLACE DE PRESTACIONES','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6050','oficina'=>'3','descripcion'=>'REG. Y CONT. COTIZANTES Y ENLACE INFORMÁTICO','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6050','oficina'=>'4','descripcion'=>'OFICINA DE BENEFICIOS NOMINALES','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6050','oficina'=>'5','descripcion'=>'AFILIACIÓN','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6051','oficina'=>'0','descripcion'=>'DEPTO. DE VIGENCIA DE DERECHOS','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6051','oficina'=>'3','descripcion'=>'REVISTA DE SUPERVIVENCIA','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6052','oficina'=>'0','descripcion'=>'DEPTO. BANCO DE DATOS','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6053','oficina'=>'0','descripcion'=>'DEPTO. DE PRESTACIONES ECONÓMICAS','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6055','oficina'=>'0','descripcion'=>'ESTANCIA GARNICA','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6056','oficina'=>'0','descripcion'=>'CENTRO DE DESARROLLO INFANTIL','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6057','oficina'=>'0','descripcion'=>'CASAS DEL PENSIONADO','subdir'=>'6050','estatus'=>'1'],
            ['ubpp' => '6060','oficina'=>'0','descripcion'=>'SUBDIRECCIÓN DE FINANZAS','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6065','oficina'=>'0','descripcion'=>'DEPTO. DE CONTABILIDAD Y PRESUPUESTO','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6065','oficina'=>'1','descripcion'=>'CONT. GRAL. Y DE CONT. DE IMPUESTOS','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6065','oficina'=>'2','descripcion'=>'CONTABILIDAD DE ADEUDOS','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6065','oficina'=>'3','descripcion'=>'PRESUPUESTO','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6066','oficina'=>'0','descripcion'=>'DEPTO. DE RECURSOS FINANCIEROS','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6066','oficina'=>'1','descripcion'=>'BANCO E INVERSIONES','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6066','oficina'=>'2','descripcion'=>'INGRESOS','subdir'=>'6060','estatus'=>'1'],
            ['ubpp' => '6066','oficina'=>'3','descripcion'=>'TESORERÍA','subdir'=>'0','estatus'=>'1']

		
		);

		foreach ($oficinas as $oficina) {
			Oficina::create($oficina);
		}
    }
}
