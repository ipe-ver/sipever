<?php

use Illuminate\Database\Seeder;
use App\Model\Rhumanos\Empleado;


class CatEmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $empleados = array(
			array( // row #0
                'id' => 1,
                'no_personal' => 4382,
                'fecha_ingreso' => '2011/06/15',
                'apellido_paterno' => 'LUNA',
                'apellido_materno' => 'RICO',
                'nombre' => 'KARLA YESSICA',
                'fecha_nacimiento' => '1986/10/30',
                'sexo' => 'FEMENINO',
                'rfc' => 'LURK8610309Z3',
                'curp' => 'LURK861030MVZNCR02',
                'nss' => '6010253652',
                'calle' => 'RAFAEL RAMIREZ',
                'no_exterior' => '84',
                'no_interior' => '',
                'colonia' => 'UNIVERSIDAD VERACRUZANA',
                'cp' => 91030,
                'telefono_fijo' => 2288156932,
                'telefono_celular' => 2281133169,
                'correo_electronico' => 'luna.rico.karla.yessica@gmail.com',
				'estatus' => 1,
            ),
            array( // row #0
                'id' => 2,
                'no_personal' => 3758,
                'fecha_ingreso' => '2010/12/02',
                'apellido_paterno' => 'MEDINA',
                'apellido_materno' => 'PALACIOS',
                'nombre' => 'JOSE MANUEL',
                'fecha_nacimiento' => '1980/06/05',
                'sexo' => 'MASCULINO',
                'rfc' => 'MEPJ800605LNV',
                'curp' => 'MEPJ800605HVZNCH01',
                'nss' => '6015896534',
                'calle' => 'BENITO JUAREZ',
                'no_exterior' => '158',
                'no_interior' => '6',
                'colonia' => 'RESIDENCIAL MONTE MAGNO',
                'cp' => 91084,
                'telefono_fijo' => 2288169548,
                'telefono_celular' => 2281158536,
                'correo_electronico' => 'jose_manuel_medinap@gmail.com',
				'estatus' => 1,
            ),
            array( // row #0
                'id' => 3,
                'no_personal' => 1258,
                'fecha_ingreso' => '1990/02/16',
                'apellido_paterno' => 'GALAN',
                'apellido_materno' => 'GARCIA',
                'nombre' => 'JOEL',
                'fecha_nacimiento' => '1990/04/17',
                'sexo' => 'MASCULINO',
                'rfc' => 'GAGJ900417NG2',
                'curp' => 'GAGJ900417HVZGRV02',
                'nss' => '6019632514',
                'calle' => 'LOS FILTROS DEL SUMIDERO',
                'no_exterior' => '7458',
                'no_interior' => '',
                'colonia' => 'LOS ROBLES DEL SUR',
                'cp' => 91856,
                'telefono_fijo' => 2288189632,
                'telefono_celular' => 2287632547,
                'correo_electronico' => 'galangj@hotmail.com',
				'estatus' => 1,
			),
			
		);

		\DB::table('rch_empleados')->insert($empleados);

    }
}



