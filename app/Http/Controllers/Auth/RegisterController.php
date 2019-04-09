<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_acreditation;
use App\Models\Tlist_operation;
use App\Models\Operation;
use App\Models\Ope_user_user;


use DB;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;



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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'sexe' => ['required', 'string', 'min:1', 'max:1'],
            'telephone' => ['required', 'string', 'max:13'],            
            'email' => ['required', 'string', 'email', 'max:70', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $newUser = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'sexe' => $data['sexe'],
            'telephone' => $data['telephone'],            
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(60),
        ]);


        $groupe_visiter = Tlist_groupe_user::where('code', 'VSTER')->first();
        $acc_lect = Tlist_acreditation::where('libelle', 'Lecture')->first();
        $acc_ecri = Tlist_acreditation::where('libelle', 'Ecriture')->first();
        $typeOperation = Tlist_operation::where('code', 'CRE')->first();

        $newUser->groupe_users()->attach($groupe_visiter);
        $newUser->acreditations()->attach($acc_lect);
        $newUser->acreditations()->attach($acc_ecri);

        $object = new Operation();
        $object->type_operation = $typeOperation['id'];
        $idLastOperation = $object->save();

        $object = new Ope_user_user();
        $object->id_operation = $idLastOperation;
        $object->id_user = $newUser;
        $object->id_user2 = $newUser;
        $object->save();

        return $newUser;
    }
}
