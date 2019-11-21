<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\Municipio;

class CatMunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipios = array(
			['clave' => '01', 'nombre' => 'AGUASCALIENTES', 'id_estado' => '01'],
            ['clave' => '02', 'nombre' => 'ASIENTOS', 'id_estado' => '01'],
            ['clave' => '03', 'nombre' => 'CALVILLO', 'id_estado' => '01'],
            ['clave' => '04', 'nombre' => 'COSIO', 'id_estado' => '01'],
            ['clave' => '05', 'nombre' => 'JESUS MARIA', 'id_estado' => '01'],
            ['clave' => '06', 'nombre' => 'PABELLON DE ARTEAGA', 'id_estado' => '01'],
            ['clave' => '07', 'nombre' => 'RINCON DE ROMOS', 'id_estado' => '01'],
            ['clave' => '08', 'nombre' => 'SAN JOSE DE GRACIA', 'id_estado' => '01'],
            ['clave' => '09', 'nombre' => 'TEPEZALA', 'id_estado' => '01'],
            ['clave' => '10', 'nombre' => 'EL LLANO', 'id_estado' => '01'],
            ['clave' => '11', 'nombre' => 'SAN FRANCISCO DE LOS ROMO', 'id_estado' => '01'],
            ['clave' => '999', 'nombre' => 'NO ESPECIFICADO', 'id_estado' => '01'],
            ['clave' => '01', 'nombre' => 'ENSENADA', 'id_estado' => '02'],
            ['clave' => '02', 'nombre' => 'MEXICALI', 'id_estado' => '02'],
            ['clave' => '03', 'nombre' => 'TECATE', 'id_estado' => '02'],
            ['clave' => '04', 'nombre' => 'TIJUANA', 'id_estado' => '02'],
            ['clave' => '05', 'nombre' => 'PLAYAS DEL ROSARITO', 'id_estado' => '02'],
            ['clave' => '999', 'nombre' => 'NO ESPECIFICADO', 'id_estado' => '02'],
            ['clave' => '01', 'nombre' => 'COMONDU', 'id_estado' => '03'],
            ['clave' => '02', 'nombre' => 'MULEGE', 'id_estado' => '03'],
            ['clave' => '03', 'nombre' => 'LA PAZ', 'id_estado' => '03'],
            ['clave' => '08', 'nombre' => 'LOS CABOS', 'id_estado' => '03'],
            ['clave' => '09', 'nombre' => 'LORETO', 'id_estado' => '03'],
            ['clave' => '999', 'nombre' => 'NO ESPECIFICADO', 'id_estado' => '03'],
            ['clave' => '01', 'nombre' => 'CALKINI', 'id_estado' => '04'],
            ['clave' => '02', 'nombre' => 'CAMPECHE', 'id_estado' => '04'],
            ['clave' => '03', 'nombre' => 'CARMEN', 'id_estado' => '04'],
            ['clave' => '04', 'nombre' => 'CHAMPOTON', 'id_estado' => '04'],
            ['clave' => '05', 'nombre' => 'HECELCHAKAN', 'id_estado' => '04'],
            ['clave' => '06', 'nombre' => 'HOPELCHEN', 'id_estado' => '04'],
            ['clave' => '07', 'nombre' => 'PALIZADA', 'id_estado' => '04'],
            ['clave' => '08', 'nombre' => 'TENABO', 'id_estado' => '04'],
            ['clave' => '09', 'nombre' => 'ESCARCEGA', 'id_estado' => '04'],
            ['clave' => '10', 'nombre' => 'CALAKMUL', 'id_estado' => '04'],
            ['clave' => '11', 'nombre' => 'CANDELARIA', 'id_estado' => '04'],
            ['clave' => '999', 'nombre' => 'NO ESPECIFICADO', 'id_estado' => '04'],

          
            ['clave' => '01', 'nombre' => 'ABASOLO', 'id_estado' => '05'],
            ['clave' => '02', 'nombre' => 'ACUÑA', 'id_estado' => '05'],
            ['clave' => '03', 'nombre' => 'ALLENDE', 'id_estado' => '05'],
            ['clave' => '04', 'nombre' => 'ARTEAGA', 'id_estado' => '05'],
            ['clave' => '05', 'nombre' => 'CANDELA', 'id_estado' => '05'],
            ['clave' => '06', 'nombre' => 'CASTAÑOS', 'id_estado' => '05'],
            ['clave' => '07', 'nombre' => 'CUATRO CIENEGAS', 'id_estado' => '05'],
            ['clave' => '08', 'nombre' => 'ESCOBEDO', 'id_estado' => '05'],
            ['clave' => '09', 'nombre' => 'FRANCISCO I. MADERO', 'id_estado' => '05'],
            ['clave' => '10', 'nombre' => 'FRONTERA', 'id_estado' => '05'],
            ['clave' => '11', 'nombre' => 'GENERAL CEPEDA', 'id_estado' => '05'],
            ['clave' => '12', 'nombre' => 'HOPELCHEN', 'id_estado' => '05'],
            ['clave' => '13', 'nombre' => 'PALIZADA', 'id_estado' => '05'],
            ['clave' => '14', 'nombre' => 'TENABO', 'id_estado' => '05'],
            ['clave' => '15', 'nombre' => 'ESCARCEGA', 'id_estado' => '05'],
            ['clave' => '16', 'nombre' => 'CALAKMUL', 'id_estado' => '05'],
            ['clave' => '17', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '18', 'nombre' => 'CHAMPOTON', 'id_estado' => '05'],
            ['clave' => '19', 'nombre' => 'HECELCHAKAN', 'id_estado' => '05'],
            ['clave' => '20', 'nombre' => 'HOPELCHEN', 'id_estado' => '05'],
            ['clave' => '21', 'nombre' => 'PALIZADA', 'id_estado' => '05'],
            ['clave' => '22', 'nombre' => 'TENABO', 'id_estado' => '05'],
            ['clave' => '23', 'nombre' => 'ESCARCEGA', 'id_estado' => '05'],
            ['clave' => '24', 'nombre' => 'CALAKMUL', 'id_estado' => '05'],
            ['clave' => '25', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '26', 'nombre' => 'HECELCHAKAN', 'id_estado' => '05'],
            ['clave' => '27', 'nombre' => 'HOPELCHEN', 'id_estado' => '05'],
            ['clave' => '28', 'nombre' => 'PALIZADA', 'id_estado' => '05'],
            ['clave' => '29', 'nombre' => 'TENABO', 'id_estado' => '05'],
            ['clave' => '30', 'nombre' => 'ESCARCEGA', 'id_estado' => '05'],
            ['clave' => '31', 'nombre' => 'CALAKMUL', 'id_estado' => '05'],
            ['clave' => '32', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '33', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '34', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '35', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '36', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '37', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '38', 'nombre' => 'CANDELARIA', 'id_estado' => '05'],
            ['clave' => '999', 'nombre' => 'NO ESPECIFICADO', 'id_estado' => '05']
            
		);

		foreach ($municipios as $municipio) {
			Municipio::create($municipio);
		}
    }
}
