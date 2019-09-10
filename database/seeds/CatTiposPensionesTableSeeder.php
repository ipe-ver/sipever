<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\TipoPension;

class CatTiposPensionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipospensiones = array(
			[ 'nombre' => 'JUBILACIÓN', 'estatus' => '1'],
			[ 'nombre' => 'VEJEZ', 'estatus' => '1'],
			[ 'nombre' => 'INVALIDEZ', 'estatus' => '1'],
			[ 'nombre' => 'INCAPACIDAD', 'estatus' => '1'],
			[ 'nombre' => 'MUERTE', 'estatus' => '1'],
			[ 'nombre' => 'JUBILACIÓN (CONVENIO 16-01-85)', 'estatus' => '1'],
			[ 'nombre' => 'VEJEZ (CONVENIO 16-01-85)', 'estatus' => '1'],
			[ 'nombre' => 'INVALIDEZ (CONVENIO 16-01-85)', 'estatus' => '1'],
			[ 'nombre' => 'INCAPACIDAD (CONVENIO 16-01-85)', 'estatus' => '1'],
			[ 'nombre' => 'MUERTE (CONVENIO 16-01-85)', 'estatus' => '1'],
			[ 'nombre' => 'JUBILACIÓN (CONVENIO 01-03-85)', 'estatus' => '1'],
			[ 'nombre' => 'VEJEZ (CONVENIO 01-03-85)', 'estatus' => '1'],
			[ 'nombre' => 'INVALIDEZ (CONVENIO 01-03-85)', 'estatus' => '1'],
			[ 'nombre' => 'INCAPACIDAD (CONVENIO 01-03-85)', 'estatus' => '1'],
			[ 'nombre' => 'MUERTE (CONVENIO 01-03-85)', 'estatus' => '1'],
			[ 'nombre' => 'JUBILACIÓN (CONVENIO 16-XI-86)', 'estatus' => '1'],
			[ 'nombre' => 'VEJEZ (CONVENIO 16-XI-86)', 'estatus' => '1'],
			[ 'nombre' => 'INVALIDEZ (CONVENIO 16-XI-86)', 'estatus' => '1'],
			[ 'nombre' => 'INCAPACIDAD (CONVENIO 16-XI-86)', 'estatus' => '1'],
			[ 'nombre' => 'MUERTE (CONVENIO 16-XI-86)', 'estatus' => '1'],
		);

		foreach ($tipospensiones as $tipopension) {
			TipoPension::create($tipopension);
		}
    }
}
