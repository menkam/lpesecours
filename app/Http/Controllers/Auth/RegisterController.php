<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_acreditation;
use App\Models\Message;
use App\Models\Message_user;


use DB;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\FonctionAuth;
use App\Fonctions;



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
    use FonctionAuth;
    //protected $redirectTo = '/home';

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
            'photo' => ['required', 'image','mimes:jpeg,jpg,png','max:10240'],
            'telephone' => ['required', 'string', 'max:13'],
            'date_nais' => ['required', 'date', 'max:2010-01-01'],
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
        $namePhoto = User::saveAvatar($_FILES["photo"],Fonctions::getCurentDateChaine($data['name']));
        if($namePhoto)
        {
            $newUser = User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'sexe' => $data['sexe'],
                'photo' => $namePhoto,
                'date_nais' => $data['date_nais'],
                'telephone' => $data['telephone'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'api_token' => Str::random(60),
            ]);
        }



        $groupe_visiter = Tlist_groupe_user::where('code', 'VSTER')->first();
        $acc_lect = Tlist_acreditation::where('libelle', 'Lecture')->first();
        $acc_ecri = Tlist_acreditation::where('libelle', 'Ecriture')->first();

        $newUser->groupe_users()->attach($groupe_visiter);
        $newUser->acreditations()->attach($acc_lect);
        $newUser->acreditations()->attach($acc_ecri);
        $msg = Message::where('id', '1')->first();
        $newUser->messages()->attach($msg);
        $idUser = $newUser->id;
        $sol = Message_user::updateMesUser($idUser,$msg['id']);

        return $newUser;
    }
}
