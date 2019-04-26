<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Tlist_acreditation;
use App\Models\Tlist_groupe_user;
use App\Models\Tlist_groupe_user_user;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Fonctions;
use Validator;
use App\FichiersCSV;
use DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'groupe_user', 
        'acreditation', 
        'name', 
        'surname', 
        'photo', 
        'date_nais', 
        'sexe', 
        'telephone', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden0 = [
        'password', 'remember_token',
    ];

    public function groupe_users()
    {
        return $this->belongsToMany(Tlist_groupe_user::class);
    }

    public function acreditations()
    {
        return $this->belongsToMany(Tlist_acreditation::class);
    }
    public function messages()
    {
        return $this->belongsToMany(Message::class);
    }

    public static function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'photo' => 'required|string',
            'date_nais' => 'required|string',
            'sexe' => 'required|string',
            'telephone' => 'required|string',
            'photo' => 'required|string',
            'email' => 'required|string'
        ]);

        if ($validator->passes()) {
            $save = User::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'photo' => $request['photo'],
                'date_nais' => $request['date_nais'],
                'sexe' => $request['sexe'],
                'telephone' => $request['telephone'],
                'photo' => $request['date'],
                'email' => $request['email']
            ]);
            if($save)
                return response()->json(['success'=>'Added Date: '.$request['date'].' -> success.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public static function createGlobalUser($arrayss)
    {
        $sol = "<h1><u>Debut de la mise à jours Utilisateur</u></h1><br>";
        $arrays = explode(Fonctions::delimiteurRows(), $arrayss);
        //dd(count($array));
        for($i=0; $i<count($arrays); $i++)
        {
            $array = explode(";", $arrays[$i]);
            if(count($array)==11)
            {
                if(!self::isExcist($array[6]))
                {
                    $request = new Request([
                        'name' => $array[0],
                        'surname' => $array[1],
                        'photo' => $array[2],
                        'date_nais' => $array[3],
                        'sexe' => $array[4],
                        'telephone' => $array[5],
                        'email' => $array[6],
                        'password' => $array[7],
                        'statut' => $array[8],
                        'created_at' => $array[9],
                        'updated_at' => $array[10]
                    ]);
                    $sol = $sol.self::createUser($request).'<br>';
                }
                else
                {
                    //$sol = $sol.response()->json(['warnings'=> 'Date: '.$array[0].' type '.$array[1].' -> existe deja!!!.']).'<br>';
                }
            }
            else
            {
                $sol = $sol.response()->json(['error'=> 'Le Format de Saisie de Données est Invalide !!!'.'<br>']);
            }
        }
        $sol = $sol."<h1><u>Fin de la mise à jours Utilisateur</u></h1><br>";
        return $sol;
    }

    public static function saveUser()
    {
        $lignes = array();
        $photos = self::getAllLine();
        $lignes[] = array('name','surname','photo','date_nais','sexe','telephone','email','password','statut','created_at','updated_at');
        foreach ($photos as $val)
        {
            $lignes[] = array(
                $val->name,
                $val->surname,
                $val->photo,
                $val->date_nais,
                $val->sexe,
                $val->telephone,
                $val->email,
                $val->password,
                $val->statut,
                $val->created_at,
                $val->updated_at,
            );
        }
        //dd($lignes);
        return FichiersCSV::ecriture("user", $lignes);
    }
    public static function isExcist($email)
    {
        return DB::select("SELECT COUNT(email) FROM users WHERE email='$email';")[0]->count;
    }

    public static function updateUser($request)
    {
        $date = Fonctions::getCurentDate();
        $updateUser = DB::update("
            UPDATE 
              users
            SET 
              name='".$request['name']."', 
              surname='".$request['surname']."', 
              photo='".$request['photo']."', 
              date_nais='".$request['date_nais']."', 
              sexe='".$request['sexe']."', 
              telephone='".$request['telephone']."', 
              email='".$request['email']."', 
              statut='".$request['statut']."',
              updated_at='$date'
            WHERE 
              id='".$request['id']."';
        ");

        $updateGroupe = DB::update("UPDATE tlist_groupe_user_user SET  tlist_groupe_user_id='".$request['tlist_groupe_user_id']."'  WHERE user_id='".$request['id']."';");

        if($updateUser && $updateGroupe) return 1;
        else return 0;
    }


    /**
     *
     */
    public function authorizeGroupe_users($groupe_user)
    {
        if (is_array($groupe_user)) {
            return $this->hasAnyGroupe_user($groupe_user) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasGroupe_user($groupe_user) || abort(401, 'This action is unauthorized.');
    }

    /**
     *
     */
    public function authorizeAcreditation($libelle)
    {
        if (is_array($libelle)) {
            return $this->hasAnyAcreditation($libelle) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasAcreditation($libelle) || abort(401, 'This action is unauthorized.');
    }


    /**
     * Check multiple groupeuser
     * @param array $code
     */
    public function hasAnyGroupe_user($code)
    {
        return null !== $this->groupe_users()->whereIn('code', $code)->first();
    }

    /**
     * Check multiple roles
     * @param array $acreditation
     */
    public function hasAnyAcreditation($libelle)
    {
        return null !== $this->acreditations()->whereIn('libelle', $libelle)->first();
    }

    /**
     * Check one groupeuser
     * @param string $code
     */
    public function hasGroupe_user($code)
    {
        return null !== $this->groupe_users()->where('code', $code)->first();
    }

    /**
     * Check one role
     * @param string $acreditation
     */
    public function hasAcreditation($libelle)
    {
        return null !== $this->acreditations()->where('libelle', $libelle)->first();
    }


    public function getGroupe_user(){
        return $this->groupe_users()->first()->id;
        //return "getGrpupe";
    }

    public function getLibelleGroupe_user(){
        return $this->groupe_users()->first()->libelle;
    }

    public function getAcreditation(){
        return $this->acreditations()->first()->id;
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAllUsers()
    {
        return DB::select("SELECT * FROM   public.users ORDER BY users.id ASC;");
    }


    public static function getOptionSexe($old)
    {
        $option = '<option value="">-----------------</option>';

        if($old=="M"||$old=="m")
        {
            $option = $option.'<option value="M" selected>Masculin  (oldValue)</option>';
            $option = $option.'<option value="F">Féminin</option>';
        }
        elseif($old=="F"||$old=="f")
        {
            $option = $option.'<option value="M">Masculin</option>';
            $option = $option.'<option value="F" selected>Féminin  (oldValue)</option>';
        }

        return $option;
    }

    /**
     * show list menu
     */
    public static function ListUsers()
    {
        $bodyListUsers = '';
        $numero = 1;
        foreach (User::getAllUsers() as $value)
        {
            $action = Fonctions::colActionTable("'user',$value->id");
            $infoGroupeUser = Tlist_groupe_user_user::getInfo($value->id);

            $bodyListUsers = $bodyListUsers.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.$value->name.'</td>
            <td>'.$value->surname.'</td>
            <td title="'.Fonctions::calculAge($value->date_nais).' ans">'.$value->date_nais.'</td>
            <td>'.Fonctions::formatNom($value->sexe).'</td>
            <td>'.$value->telephone.'</td>
            <td>'.$value->email.'</td>
            <!--td>'.$value->password.'</td-->
            <td title="'.$infoGroupeUser->libelle.'">'.$infoGroupeUser->code.'</td>
            <td>'.Fonctions::formatStatut($value->statut).'</td>
            <td>'.$action.'</td>
            </tr>';
        }
        return $bodyListUsers;
    }

    public static function getAllLine($id = null, $statut=null)
    {
        if(!empty($statut) && !empty($id)) return DB::select("SELECT * FROM public.users WHERE users.id = '$id' AND users.statut = '$statut';")[0];
        elseif(!empty($statut)) return DB::select("SELECT * FROM public.users WHERE users.statut = '$statut';")[0];
        elseif(!empty($id)) return DB::select("SELECT * FROM public.users WHERE  users.id = '$id';")[0];
        else return DB::select("SELECT name, surname, photo, date_nais, sexe, telephone, email, password, statut, created_at, updated_at FROM public.users;");
    }

    public static function getContentUpdate($id)
    {
        $sol = User::getAllLine($id, null);
        $page = "ras";
        $page ='
            <input type="hidden" id="id" value="'.$sol->id.'" name="id">
            <div class="form-group"  style="">
                <label class="control-label" for="idGroupeuser">groupeuser</label>
                <select name="idGroupeuser" id="idGroupeuser"class="form-control" data-error="Choisir le groupe utilisateur accessible au menu." required >
                    '.Tlist_groupe_user::getOption(null,$sol->id).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="name">name</label>
                <input type="text" name="name" id="name" value="'.$sol->name.'" class="form-control" data-error="Entrer le nom." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="surname">surname</label>
                <input type="text" name="surname" id="surname" value="'.$sol->surname.'" class="form-control" data-error="Entrer le prenom." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="espece">photo</label>
                <input type="text" name="photo" id="photo" value="'.$sol->photo.'" class="form-control" data-error="choisir un phonto." >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="compte_momo">date_nais</label>
                <input type="date" name="date_nais" id="date_nais" value="'.$sol->date_nais.'" class="form-control" data-error="choisir la date de naissance." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="compte2">sexe</label>
                <select name="sexe" id="sexe" class="form-control" data-error="Choisir le sexe." required >
                '.User::getOptionSexe($sol->sexe).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="telephone">telephone</label>
                <input type="phone" name="telephone" id="frais_transfert" value="'.$sol->telephone.'" class="form-control" data-error="Entrer la valeur du telephone." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="email">email</label>
                <input type="email" name="email" id="email" value="'.$sol->email.'" class="form-control" data-error="Entrer la valeur de l\'email." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="statut">statut</label>
                <input type="number" name="statut" id="statut" value="'.$sol->statut.'" class="form-control" data-error="Entrer la valeur du statut." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }

    public static function getUser($id)
    {
        $sol = User::getAllLine('1',$id);
        $page = "ras";
        $page ='
            <input type="hidden" id="id" value="'.$sol->id.'" name="id">
            <div class="form-group"  style="">
                <label class="control-label" for="name">Nom</label>
                <input type="number" name="name" id="fond" value="'.$sol->name.'" class="form-control" data-error="Entrer le nom." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="surname">Prenom</label>
                <input type="number" name="surname" id="pret" value="'.$sol->surname.'" class="form-control" data-error="Entrer le prenom." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="sexe">Sexe</label>
                <input type="number" name="sexe" id="sexe" value="'.$sol->sexe.'" class="form-control" data-error="Entrer le Sexe." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="photo">Photo</label>
                <input type="number" name="photo" id="photo" value="'.$sol->photo.'" class="form-control" data-error="Choisir une photos." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="date_nais">Date_Nais.</label>
                <input type="number" name="date_nais" id="date_nais" value="'.$sol->date_nais.'" class="form-control" data-error="Choisir la date de naissance." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="telephone">Phone</label>
                <input type="number" name="telephone" id="telephone" value="'.$sol->telephone.'" class="form-control" data-error="Entrer le numero de téléphone." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="email">Email</label>
                <input type="number" name="email" id="email" value="'.$sol->email.'" class="form-control" data-error="Entrer l\'adresse e-mail." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }
}