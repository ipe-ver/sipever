<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\UnidadesAlmacen;

class CatUnidadesAlmacenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = array(
			[ 'descripcion' => 'PZA.', 'descripcion_larga' => 'PIEZA(S)', 'estatus' => '1'],
			[ 'descripcion' => 'CJA.', 'descripcion_larga' => 'CAJA(S)', 'estatus' => '1'],
			[ 'descripcion' => 'CTO.', 'descripcion_larga' => 'CIENTO(S)', 'estatus' => '1'],
			[ 'descripcion' => 'BLK.', 'descripcion_larga' => 'BLOCK(S)', 'estatus' => '1'],
			[ 'descripcion' => 'PGO.', 'descripcion_larga' => 'PLIEGO(S)', 'estatus' => '1'],
			[ 'descripcion' => 'MTO.', 'descripcion_larga' => 'METRO(S)', 'estatus' => '1'],
			[ 'descripcion' => 'LTO.', 'descripcion_larga' => 'LITRO(S)', 'estatus' => '1'],
			[ 'descripcion' => 'KLO.', 'descripcion_larga' => 'KILO(S)', 'estatus' => '1'],
			[ 'descripcion' => 'JGO.', 'descripcion_larga' => 'JUEGO(S)', 'estatus' => '1'],
			[ 'descripcion' => 'PAQ.', 'descripcion_larga' => 'PAQUETE(S)', 'estatus' => '1']
			
		);

		foreach ($unidades as $unidad) {
			UnidadesAlmacen::create($unidad);
		}
    }
}
