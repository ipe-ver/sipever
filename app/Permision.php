<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permision extends \Spatie\Permission\Models\Permission
{	

	/*protected $table = 'permissions';

    protected $fillable = ['name', 'guard_name'];*/

    protected $attributes = ['guard_name' => 'web'];	

   /* public function roles()
    {
    	return $this->belongsToMany('App\Role','role_has_permissions');
    }*/

    public function roles() 
    {
        return $this->belongsToMany('App\Role', 'role_has_permissions', 'permission_id', 'role_id');
    }

    public static function defaultPermissions()
    {
    	return [
    		'view_users',
    		'add_users',
    		'edit_users',
    		'delete_users',

    		'view_roles',
    		'add_roles',
    		'edit_roles',
    		'delete_roles',

    		'view_categorias',
    		'add_categorias',
    		'edit_categorias',
    		'delete_categorias',

    	];
    }
}