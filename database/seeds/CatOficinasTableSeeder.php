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
			[ 'clave' => '1', 'nombre' => 'OPERADORA DE HOTELES', 'estatus' => '1', 'id_ubpp' => '1'],
			[ 'clave' => '2', 'nombre' => 'PRENSA',  'estatus' => '1', 'id_ubpp' => '1'],
            [ 'clave' => '1', 'nombre' => 'PROTECCIÓN CIVIL',  'estatus' => '1', 'id_ubpp' => '9'],
            [ 'clave' => '2', 'nombre' => 'S.T.I.P.E.',  'estatus' => '1', 'id_ubpp' => '9'],
            [ 'clave' => '4', 'nombre' => 'ORGANIZACIÓN Y MÉTODOS',  'estatus' => '1', 'id_ubpp' => '9'],
            [ 'clave' => '5', 'nombre' => 'S.U.I.P.E.V.',  'estatus' => '1', 'id_ubpp' => '9'],
            [ 'clave' => '1', 'nombre' => 'OFICIALÍA',  'estatus' => '1', 'id_ubpp' => '11'],
            [ 'clave' => '2', 'nombre' => 'IMPRESIONES',  'estatus' => '1', 'id_ubpp' => '11'],
            [ 'clave' => '3', 'nombre' => 'ARCHIVO GENERAL',  'estatus' => '1', 'id_ubpp' => '11'],
            [ 'clave' => '1', 'nombre' => 'ALMACÉN GENERAL',  'estatus' => '1', 'id_ubpp' => '12'],
            [ 'clave' => '1', 'nombre' => 'ESTACIONAMIENTO ISSSTE',  'estatus' => '1', 'id_ubpp' => '14'],
            [ 'clave' => '1', 'nombre' => 'ENLACE DE PRESTACIONES',  'estatus' => '1', 'id_ubpp' => '17'],
            [ 'clave' => '2', 'nombre' => 'VIGENCIA DE DERECHOS',  'estatus' => '1', 'id_ubpp' => '17'],
            [ 'clave' => '3', 'nombre' => 'BENEFICIOS NOMINALES',  'estatus' => '1', 'id_ubpp' => '17'],
            [ 'clave' => '4', 'nombre' => 'AFILIACIÓN',  'estatus' => '1', 'id_ubpp' => '17'],
            [ 'clave' => '3', 'nombre' => 'REVISTA DE SUPERVIVENCIA',  'estatus' => '1', 'id_ubpp' => '18'],
            [ 'clave' => '1', 'nombre' => 'CONT. GRAL. Y DE CONT. DE IMPUESTOS',  'estatus' => '1', 'id_ubpp' => '24'],
            [ 'clave' => '2', 'nombre' => 'CONTABILIDAD DE ADEUDOS',  'estatus' => '1', 'id_ubpp' => '24'],
            [ 'clave' => '3', 'nombre' => 'PRESUPUESTO',  'estatus' => '1', 'id_ubpp' => '24'],
            [ 'clave' => '1', 'nombre' => 'BANCOS E INVERSIONES',  'estatus' => '1', 'id_ubpp' => '25'],
            [ 'clave' => '2', 'nombre' => 'INGRESOS',  'estatus' => '1', 'id_ubpp' => '25'],
            [ 'clave' => '3', 'nombre' => 'TESORERÍA',  'estatus' => '1', 'id_ubpp' => '25'],
		
		);

		foreach ($oficinas as $oficina) {
			Oficina::create($oficina);
		}
    }
}


