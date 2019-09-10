<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\UBPP;

class CatUbppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubpps = array(
			[ 'clave' => '6000', 'nombre' => 'DIRECCIÓN GENERAL', 'estatus' => '1'],
			[ 'clave' => '6001', 'nombre' => 'DEPTO. DE BIENES INMUEBLES',  'estatus' => '1'],
			[ 'clave' => '6003', 'nombre' => 'UNIDAD DE GÉNERO',  'estatus' => '1'],
			[ 'clave' => '6004', 'nombre' => 'UNIDAD DE TRANSPARENCIA',  'estatus' => '1'],
			[ 'clave' => '6010', 'nombre' => 'ÓRGANO INTERNO DE CONTROL',  'estatus' => '1'],
			[ 'clave' => '6020', 'nombre' => 'SUBDIRECCIÓN JURÍDICA',  'estatus' => '1'],
			[ 'clave' => '6021', 'nombre' => 'DEPTO. DE LO CONTENCIOSO', 'estatus' => '1'],
			[ 'clave' => '6022', 'nombre' => 'DEPTO. DE LO CONSULTIVO', 'estatus' => '1'],
			[ 'clave' => '6030', 'nombre' => 'SUBDIRECCIÓN ADMINISTRATIVA',  'estatus' => '1'],
			[ 'clave' => '6031', 'nombre' => 'DEPTO. DE RECURSOS HUMANOS', 'estatus' => '1'],
			[ 'clave' => '6032', 'nombre' => 'DEPTO. DE SERVICIOS GENERALES',  'estatus' => '1'],
			[ 'clave' => '6033', 'nombre' => 'DEPTO. DE ADQ. E INVENTARIOS',  'estatus' => '1'],
			[ 'clave' => '6034', 'nombre' => 'DEPTO. DE TECNOLOGÍAS DE LA INFORMACIÓN', 'estatus' => '1'],
			[ 'clave' => '6038', 'nombre' => 'ESTACIONAMIENTO',  'estatus' => '1'],
			[ 'clave' => '6039', 'nombre' => 'CENTRO DE ATENCIÓN INFANTIL', 'estatus' => '1'],
			[ 'clave' => '6040', 'nombre' => 'CASA DEL PENSIONADO',  'estatus' => '1'],
			[ 'clave' => '6050', 'nombre' => 'SUBDIR. DE PRESTACIONES INSTITUCIONALES',  'estatus' => '1'],
			[ 'clave' => '6051', 'nombre' => 'DEPTO. DE VIGENCIA DE DERECHOS', 'estatus' => '1'],
			[ 'clave' => '6052', 'nombre' => 'DEPTO. BANCO DE DATOS',  'estatus' => '1'],
			[ 'clave' => '6053', 'nombre' => 'DEPTO. DE PRESTACIONES ECÓNOMICAS', 'estatus' => '1'],
            [ 'clave' => '6056', 'nombre' => 'CENTRO DE DESARROLLO INFANTIL', 'estatus' => '1'],
            [ 'clave' => '6057', 'nombre' => 'CASAS DEL PENSIONADO',  'estatus' => '1'],
			[ 'clave' => '6060', 'nombre' => 'SUBDIRECCIÓN DE FINANZAS',  'estatus' => '1'],
            [ 'clave' => '6065', 'nombre' => 'DEPTO. DE CONTABILIDAD Y PRESUPUESTO',  'estatus' => '1'],
            [ 'clave' => '6066', 'nombre' => 'DEPTO. DE RECURSOS FINANCIEROS', 'estatus' => '1']
		);

		foreach ($ubpps as $ubpp) {
			UBPP::create($ubpp);
		}
    }
}
