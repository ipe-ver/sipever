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
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_almacen_admin = Role::where('name', 'almacen_admin')->first();
        $role_compras_admin = Role::where('name', 'compras_admin')->first();
    
        //Usuario 
        $user = new User();
        $user->name = 'user';
        $user->username = 'KJIMENEZ';
        $user->email = 'user@ipe.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);


        //Administrador
        $user = new User();
        $user->name = 'admin';
        $user->username = 'EGUTIERREZ';
        $user->email = 'admin@ipe.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        //Administrador de Almacén
        $user = new User();
        $user->name = 'almacen_admin';
        $user->username = 'SCASTILLO';
        $user->email = 'almacen_admin@ipe.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_almacen_admin);

         //Administrador de Compras
         $user = new User();
         $user->name = 'compras_admin';
         $user->username = 'AMEDINA';
         $user->email = 'compras_admin@ipe.com';
         $user->password = bcrypt('secret');
         $user->save();
         $user->roles()->attach($role_compras_admin);

        

    }
}

