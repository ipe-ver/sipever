<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\GruposAlmacen;

class CatGruposAlmacenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupos = array(
			[ 'clave' => '2471', 'descripcion' => 'ARTS METÁLICOS PARA LA CONSTRUCCIÓN', 'estatus' => '1'],
			[ 'clave' => '2611', 'descripcion' => 'COMBUSTIBLES Y LUBRICANTES', 'estatus' => '1'],
			[ 'clave' => '2911', 'descripcion' => 'HERRAMIENTAS MENORES', 'estatus' => '1'],
			[ 'clave' => '2122', 'descripcion' => 'MATERIAL DE FOTOGRAFÍA', 'estatus' => '1'],
			[ 'clave' => '2121', 'descripcion' => 'MATERIAL DE IMPRENTA', 'estatus' => '1'],
			[ 'clave' => '2161', 'descripcion' => 'MATERIAL DE LIMPIEZA', 'estatus' => '1'],
			[ 'clave' => '2491', 'descripcion' => 'MATERIAL DE PINTURA', 'estatus' => '1'],
			[ 'clave' => '2461', 'descripcion' => 'MATERIAL ELÉCTRICO Y ELECTRÓNICA', 'estatus' => '1'],
			[ 'clave' => '2141', 'descripcion' => 'MATERIAL PARA COMPUTADORA', 'estatus' => '1'],
			[ 'clave' => '2991', 'descripcion' => 'MATERTIALES Y SUMINISTROS VARIOS', 'estatus' => '1'],
			[ 'clave' => '2721', 'descripcion' => 'PRENDAS DE PROTECCIÓN', 'estatus' => '1'],
			[ 'clave' => '3361', 'descripcion' => 'SERVICIOS DE FOTOCOPIADO E IMPRESIÓN DE FORMAS', 'estatus' => '1'],
			[ 'clave' => '2111', 'descripcion' => 'ÚTILES DE ESCRITORIO Y OFICINA', 'estatus' => '1']
		);

		foreach ($grupos as $grupo) {
			GruposAlmacen::create($grupo);
		}
    }
}
