<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $role_admin = Role::where('name', 'admin')->first();
        //$role_almacen_admin = Role::where('name', 'almacen_admin')->first();
        //$role_almacen_capturista = Role::where('name', 'almacen_capturista')->first();
        //$role_almacen_oficinista = Role::where('name', 'almacen_oficinista')->first();
      

        //Administrador
        $user = new User();
        $user->name = 'admin';
        $user->username = 'KLUNA';
        $user->email = 'kluna@ipe.com';
        $user->password = bcrypt('1234567');
        $user->id_empleado = 3;
        $user->save();
        $user->roles()->attach($role_admin);

        //Administrador de Almacén
        /*$user = new User();
        $user->name = 'almacen_admin';
        $user->username = 'SCASTILLO';
        $user->email = 'scastillo@ipe.com';
        $user->password = bcrypt('secret');
        $user->id_empleado = 1;
        $user->save();
        $user->roles()->attach($role_almacen_admin);*/

        //Capturista de Almacén
        /*$user = new User();
        $user->name = 'almacen_capturista';
        $user->username = 'EGUTIERREZ';
        $user->email = 'egutierrez@ipe.com';
        $user->password = bcrypt('secret');
        $user->id_empleado = 2;
        $user->save();
        $user->roles()->attach($role_almacen_capturista);*/

        //Oficinista de Almacén
       /* $user = new User();
        $user->name = 'almacen_oficinista';
        $user->username = 'ABARRADAS';
        $user->email = 'abarradas@ipe.com';
        $user->password = bcrypt('secret');
        $user->id_empleado = 4;
        $user->save();
        $user->roles()->attach($role_almacen_oficinista);*/


    }
}

