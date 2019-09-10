<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\Vivienda;

class CatViviendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viviendas = array(
			[ 'clave' => '1', 'nombre' => 'PROPIA', 'estatus' => '1'],
			[ 'clave' => '2', 'nombre' => 'RENTADA', 'estatus' => '1'],
			[ 'clave' => '3', 'nombre' => 'PRESTADA', 'estatus' => '1'],
			[ 'clave' => '4', 'nombre' => 'CON FAMILIARES', 'estatus' => '1'],
			[ 'clave' => '5', 'nombre' => 'SE DESCONOCE', 'estatus' => '1'],
			[ 'clave' => '6', 'nombre' => 'VIV. UNIFAMILIARES', 'estatus' => '1'],
			[ 'clave' => '7', 'nombre' => 'LUIS G. RUIZ', 'estatus' => '1'],
			[ 'clave' => '8', 'nombre' => 'U.H. LAS BRISAS I', 'estatus' => '1'],
			[ 'clave' => '9', 'nombre' => 'U.H. PLUVIOSILLA', 'estatus' => '1'],
			[ 'clave' => '10', 'nombre' => 'U.H. INDECO ANIMAS', 'estatus' => '1'],
			[ 'clave' => '11', 'nombre' => 'U.H. TAMPIQUEÑA', 'estatus' => '1'],
			[ 'clave' => '12', 'nombre' => 'U.H. JARDINES DE XALAPA (VAIM)', 'estatus' => '1'],
			[ 'clave' => '13', 'nombre' => 'U.H. JARDINES DE XALAPA (VISA)', 'estatus' => '1'],
			[ 'clave' => '14', 'nombre' => 'EDIF. JAZMIN-CORDOBA', 'estatus' => '1'],
			[ 'clave' => '15', 'nombre' => 'U.H. SETSE-COATEPEC', 'estatus' => '1'],
			[ 'clave' => '16', 'nombre' => 'U.H. SETSE HUATUSCO', 'estatus' => '1'],
			[ 'clave' => '17', 'nombre' => 'U.H. ALVARADO', 'estatus' => '1'],
			[ 'clave' => '18', 'nombre' => 'U.H. SETSE COSCOMATEPEC', 'estatus' => '1'],
			[ 'clave' => '19', 'nombre' => 'U.H. ARAUCARIAS', 'estatus' => '1'],
			[ 'clave' => '20', 'nombre' => 'U.H. MARCO ANTONIO MUÑOZ', 'estatus' => '1'],
			[ 'clave' => '21', 'nombre' => 'U.H. ATENAS', 'estatus' => '1'],
			[ 'clave' => '22', 'nombre' => 'U.H. PLAYA SOL', 'estatus' => '1'],
			[ 'clave' => '23', 'nombre' => 'U.H. SDTEV-HUATUSCO', 'estatus' => '1'],
			[ 'clave' => '24', 'nombre' => 'U.H. SDTEV-COSCOMATEPEC', 'estatus' => '1'],
			[ 'clave' => '25', 'nombre' => 'U.H. SNTE-COATEPEC', 'estatus' => '1'],
			[ 'clave' => '26', 'nombre' => 'U.H. EL JOBO', 'estatus' => '1'],
			[ 'clave' => '27', 'nombre' => 'U.H. SAN MARCIAL I Y II', 'estatus' => '1'],
			[ 'clave' => '28', 'nombre' => 'U.H. CUALIPAN (MG.)', 'estatus' => '1'],
			[ 'clave' => '29', 'nombre' => 'U.H. LAS BRISAS II', 'estatus' => '1'],
			[ 'clave' => '30', 'nombre' => 'U.H. MOLINA Y MATAMOROS', 'estatus' => '1'],
			[ 'clave' => '31', 'nombre' => 'U.H. SIPEH ANIMAS', 'estatus' => '1'],
			[ 'clave' => '32', 'nombre' => 'U.H. MALIBRAN', 'estatus' => '1'],
			[ 'clave' => '33', 'nombre' => 'U.H. SDTEV-PANUCO', 'estatus' => '1'],
			[ 'clave' => '34', 'nombre' => 'U.H. HICACAL', 'estatus' => '1'],
			[ 'clave' => '35', 'nombre' => 'U.H. SAN MARCIAL III', 'estatus' => '1'],
			[ 'clave' => '36', 'nombre' => 'U.H. MAESTROS VERACRUZANOS', 'estatus' => '1'],
			[ 'clave' => '37', 'nombre' => 'U.H. MAGUEYITOS', 'estatus' => '1'],
			[ 'clave' => '38', 'nombre' => 'U.H. BUENA VISTA I', 'estatus' => '1'],
			[ 'clave' => '39', 'nombre' => 'U.H. BUENA VISTA II', 'estatus' => '1'],
			[ 'clave' => '40', 'nombre' => 'U.H. SNTE-SANTIAGO TUXTLA', 'estatus' => '1'],
			[ 'clave' => '42', 'nombre' => 'U.H. SNTE-MARTINEZ DE LA TORRE', 'estatus' => '1'],
			[ 'clave' => '43', 'nombre' => 'U.H. BUGAMBILIAS', 'estatus' => '1'],
			[ 'clave' => '44', 'nombre' => 'U.H. VOLCAN DE COLIMA', 'estatus' => '1'],
			[ 'clave' => '45', 'nombre' => 'U.H. JARDIN', 'estatus' => '1'],
			[ 'clave' => '46', 'nombre' => 'U.H. DEL BOSQUE', 'estatus' => '1'],
			[ 'clave' => '47', 'nombre' => 'U.H. ADOLFO RUIZ CORTINEZ', 'estatus' => '1'],
			[ 'clave' => '48', 'nombre' => 'U.H. SARABIA', 'estatus' => '1'],
			[ 'clave' => '49', 'nombre' => 'U.H. TABACHINES 2 TORRES', 'estatus' => '1'],
			[ 'clave' => '50', 'nombre' => 'U.H. MIGUEL A. DE QUEVEDO', 'estatus' => '1'],
			[ 'clave' => '51', 'nombre' => 'U.H. ADOLFO L. SOSA', 'estatus' => '1'],
			[ 'clave' => '52', 'nombre' => 'U.H. MODELO', 'estatus' => '1'],
			[ 'clave' => '53', 'nombre' => 'U.H. JARDIN-HUATUSCO', 'estatus' => '1'],
			[ 'clave' => '54', 'nombre' => 'U.H. MACUILTEPETL', 'estatus' => '1'],
			[ 'clave' => '55', 'nombre' => 'U.H. JARDIN-ORIZABA', 'estatus' => '1'],
			[ 'clave' => '56', 'nombre' => 'U.H. JARDIN-CORDOBA', 'estatus' => '1'],
			[ 'clave' => '86', 'nombre' => 'CASA', 'estatus' => '1']
		);

		foreach ($viviendas as $vivienda) {
			Vivienda::create($vivienda);
		}
    }
}
