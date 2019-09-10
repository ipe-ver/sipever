<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\Situacion;

class CatSituacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situaciones = array(
			[ 'clave' => '0', 'nombre' => 'NORMAL', 'estatus' => '1'],
			[ 'clave' => '1', 'nombre' => 'AFILIADO SIN SOLICITUD', 'estatus' => '1'],
			[ 'clave' => '2', 'nombre' => 'CAUSO BAJA', 'estatus' => '1'],
			[ 'clave' => '3', 'nombre' => 'FINANC. DE ENG. LOMA HERMOSA', 'estatus' => '1'],
			[ 'clave' => '4', 'nombre' => 'INCOBRABLES', 'estatus' => '1'],
			[ 'clave' => '5', 'nombre' => 'ALTA FIADOR', 'estatus' => '1'],
			[ 'clave' => '6', 'nombre' => 'APLICACIÓN DE CUOTAS', 'estatus' => '1'],
			[ 'clave' => '7', 'nombre' => 'CAMBIO DE ACTIVO A PENSIONADO', 'estatus' => '1'],
			[ 'clave' => '8', 'nombre' => 'FALLECIMIENTO', 'estatus' => '1'],
			[ 'clave' => '9', 'nombre' => 'INACTIVOS', 'estatus' => '1'],
			[ 'clave' => '10', 'nombre' => 'LICENCIA SIN GOCE DE SUELDO', 'estatus' => '1'],
			[ 'clave' => '11', 'nombre' => 'PRORROGA DE LIC. S/GOCE DE SUELDO', 'estatus' => '1'],
			[ 'clave' => '12', 'nombre' => 'REINGR. POR TERMINO LIC. S/GOCE DE SUELDO', 'estatus' => '1'],
			[ 'clave' => '13', 'nombre' => 'REINGRESO AL SERVICIO', 'estatus' => '1'],
			[ 'clave' => '14', 'nombre' => 'NOMBRAMIENTO LIMITADO', 'estatus' => '1'],
			[ 'clave' => '15', 'nombre' => 'ADEUDOS BOSQUES DEL RECUERDO', 'estatus' => '1'],
			[ 'clave' => '16', 'nombre' => 'ADEUDO MANTTO Y MENS POR CASAS', 'estatus' => '1'],
			[ 'clave' => '17', 'nombre' => 'ADEUDO POLIZAS DE SEGUROS', 'estatus' => '1'],
			[ 'clave' => '18', 'nombre' => 'ADEUDO MENS AUTOFINANCIAMIENTO', 'estatus' => '1'],
			[ 'clave' => '19', 'nombre' => 'ADEUDA ENGANCHE DE CASAS', 'estatus' => '1'],
			[ 'clave' => '20', 'nombre' => 'APLICACIÓN DE ADEUDOS', 'estatus' => '1']
		);

		foreach ($situaciones as $situacion) {
			Situacion::create($situacion);
		}
    }
}
