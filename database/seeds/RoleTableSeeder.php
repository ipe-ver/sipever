<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();*/


        $role = Role::create(['name' => 'admin', 'description' => 'Administrator']);
        Permission::create(['name' => 'admin_roles_create']);
        Permission::create(['name' => 'admin_roles_edit']);
        Permission::create(['name' => 'admin_roles_show']);
        Permission::create(['name' => 'admin_roles_destroy']);
        //$role->givePermissionTo('admin_roles_agregar');

        $role->givePermissionTo([
            'admin_roles_create',
            'admin_roles_edit',
            'admin_roles_show',
            'admin_roles_destroy'
        ]);

        



        $role = Role::create(['name' => 'user', 'description' => 'User']);
        Permission::create(['name' => 'user_roles_create']);
        Permission::create(['name' => 'user_roles_edit']);
        Permission::create(['name' => 'user_roles_show']);
        //$role->givePermissionTo('admin_roles_ver');

        $role->givePermissionTo([
            'user_roles_create',
            'user_roles_edit',
            'user_roles_show'
        ]);

        $role = Role::create(['name' => 'almacen_admin', 'description' => 'Almacen_admin']);
        Permission::create(['name' => 'almacen_admin_roles_create']);
        Permission::create(['name' => 'almacen_admin_roles_edit']);
        Permission::create(['name' => 'almacen_admin_roles_show']);
        Permission::create(['name' => 'almacen_admin_roles_destroy']);
        //$role->givePermissionTo('admin_roles_ver');

        $role->givePermissionTo([
            'almacen_admin_roles_create',
            'almacen_admin_roles_edit',
            'almacen_admin_roles_show',
            'almacen_admin_roles_destroy'
        ]);

        $role = Role::create(['name' => 'compras_admin', 'description' => 'Compras_admin']);
        Permission::create(['name' => 'compras_admin_roles_create']);
        Permission::create(['name' => 'compras_admin_roles_edit']);
        Permission::create(['name' => 'compras_admin_roles_show']);
        Permission::create(['name' => 'compras_admin_roles_destroy']);
        //$role->givePermissionTo('admin_roles_ver');

        $role->givePermissionTo([
            'compras_admin_roles_create',
            'compras_admin_roles_edit',
            'compras_admin_roles_show',
            'compras_admin_roles_destroy'
        ]);

    }
}


