<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\Estado;

class CatEstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array(
			['clave' => '01', 'nombre' => 'Aguascalientes', 'abreviatura' => 'Ags', 'renapo' => 'AS'],
			['clave' => '02', 'nombre' => 'Baja California', 'abreviatura' => 'BC', 'renapo' => 'BC' ],
			['clave' => '03', 'nombre' => 'Baja California Sur', 'abreviatura' => 'BCS', 'renapo' => 'BS' ],
			['clave' => '04', 'nombre' => 'Campeche', 'abreviatura' => 'Camp', 'renapo' => 'CM' ],
			['clave' => '05', 'nombre' => 'Coahuila de Zaragoza', 'abreviatura' => 'Coah', 'renapo' => 'CL' ],
			['clave' => '06', 'nombre' => 'Colima', 'abreviatura' => 'Col', 'renapo' => 'CM' ],
			['clave' => '07', 'nombre' => 'Chiapas', 'abreviatura' => 'Chis', 'renapo' => 'CS' ],
			['clave' => '08', 'nombre' => 'Chihuahua', 'abreviatura' => 'Chih', 'renapo' => 'CH' ],
			['clave' => '09', 'nombre' => 'Ciudad de México', 'abreviatura' => 'DF', 'renapo' => 'DF' ],
			['clave' => '10', 'nombre' => 'Durango', 'abreviatura' => 'Dgo.', 'renapo' => 'DG' ],
			['clave' => '11', 'nombre' => 'Guanajuato', 'abreviatura' => 'Gto.', 'renapo' => 'GT' ],
			['clave' => '12', 'nombre' => 'Guerrero', 'abreviatura' => 'Gro.', 'renapo' => 'GR' ],
			['clave' => '13', 'nombre' => 'Hidalgo', 'abreviatura' => 'Hgo.', 'renapo' => 'HG' ],
			['clave' => '14', 'nombre' => 'Jalisco', 'abreviatura' => 'Jal.', 'renapo' => 'JC' ],
			['clave' => '15', 'nombre' => 'Estado de México', 'abreviatura' => 'Mex.', 'renapo' => 'MC' ],
			['clave' => '16', 'nombre' => 'Michoacán de Ocampo', 'abreviatura' => 'Mich.', 'renapo' => 'MN' ],
			['clave' => '17', 'nombre' => 'Morelos', 'abreviatura' => 'Mor.', 'renapo' => 'MS' ],
			['clave' => '18', 'nombre' => 'Nayarit', 'abreviatura' => 'Nay.', 'renapo' => 'NT' ],
			['clave' => '19', 'nombre' => 'Nuevo León', 'abreviatura' => 'NL', 'renapo' => 'NL' ],
			['clave' => '20', 'nombre' => 'Oaxaca', 'abreviatura' => 'Oax.', 'renapo' => 'OC' ],
			['clave' => '21', 'nombre' => 'Puebla', 'abreviatura' => 'Pue.', 'renapo' => 'PL' ],
			['clave' => '22', 'nombre' => 'Querétaro', 'abreviatura' => 'Qro.', 'renapo' => 'QT' ],
			['clave' => '23', 'nombre' => 'Quintana Roo', 'abreviatura' => 'Q. Roo', 'renapo' => 'QR' ],
			['clave' => '24', 'nombre' => 'San Luis Potosí', 'abreviatura' => 'SLP', 'renapo' => 'SP' ],
			['clave' => '25', 'nombre' => 'Sinaloa', 'abreviatura' => 'Sin.', 'renapo' => 'SL' ],
			['clave' => '26', 'nombre' => 'Sonora', 'abreviatura' => 'Son.', 'renapo' => 'SR' ],
			['clave' => '27', 'nombre' => 'Tabasco', 'abreviatura' => 'Tab.', 'renapo' => 'TC' ],
			['clave' => '28', 'nombre' => 'Tamaulipas', 'abreviatura' => 'Tamps.', 'renapo' => 'TS' ],
			['clave' => '29', 'nombre' => 'Tlaxcala', 'abreviatura' => 'Tlax.', 'renapo' => 'TL' ],
			['clave' => '30', 'nombre' => 'Veracruz de Ignacio de la Llave', 'abreviatura' => 'Ver.', 'renapo' => 'VZ' ],
			['clave' => '31', 'nombre' => 'Yucatán', 'abreviatura' => 'Yuc.', 'renapo' => 'YN' ],
			['clave' => '32', 'nombre' => 'Zacatecas', 'abreviatura' => 'Zac.', 'renapo' => 'ZS' ],
			['clave' => '36', 'nombre' => 'Nacido en el extranjero', 'abreviatura' => 'Ext.', 'renapo' => 'NE' ],
			['clave' => '97', 'nombre' => 'No aplica', 'abreviatura' => 'NA', 'renapo' => 'NA' ],
			['clave' => '98', 'nombre' => 'Se ignora', 'abreviatura' => 'SI', 'renapo' => 'SI' ],
			['clave' => '99', 'nombre' => 'No especificado', 'abreviatura' => '', 'renapo' => 'XX']
		);

		foreach ($estados as $estado) {
			Estado::create($estado);
		}
    }
}
