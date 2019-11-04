<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Validator;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

<<<<<<< HEAD
=======

>>>>>>> b6eb8ecc5fc3f4c46e872efe40900ba9c1dd2f76

/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name'              => 'required|string|max:255',
            'username'          => 'required|string|max:255|unique:users',
            'email'             => 'required|string|email|max:255|unique:users',
<<<<<<< HEAD
            'password'          => 'required|string|min:6',
            'id_empleado'       => 'required',
            'id_role'           => 'required',
=======
            'password'          => 'required|string|min:6|confirmed',
            'id_empleado'       => 'required',
>>>>>>> b6eb8ecc5fc3f4c46e872efe40900ba9c1dd2f76
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    

    protected function create(array $data)
    {
      

        $role = $data['id_role'];

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
<<<<<<< HEAD
            'id_empleado' => $data['id_empleado'], 
                    
        ]);

        $user = User::find($user->id);
       
        $user->roles()->attach($role);

=======
            'id_empleado' => $data['id_empleado'],
        ]);
        dd($user);
        
        $user
            ->roles()
            ->attach(Role::where('name', 'user')->first());
>>>>>>> b6eb8ecc5fc3f4c46e872efe40900ba9c1dd2f76
        return $user;
    }

    public function registro(Request $request)
    {        
<<<<<<< HEAD
        
=======
        //try {
           // dd($request);
>>>>>>> b6eb8ecc5fc3f4c46e872efe40900ba9c1dd2f76
            $this->validator($request->all())->validate();
            $request->request->add(['name' => $request->username]);
            $usuario = $this->create($request->all());

            return \Response::json(['estatus' => true,
                                    'tipo' => 'success', 
                                    'mensaje'=>'Los datos se almacenaron correctamente'], 200);

                        
    }
}
