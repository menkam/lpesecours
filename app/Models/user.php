<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Tlist_acreditation;
use App\Models\Tlist_groupe_user;
use App\Fonctions;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
    protected $hidden = [
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

    /**
     * show list menu
     */
    public static function ListUsers()
    {
        $bodyListUsers = '';
        $numero = 1;
        foreach (User::all() as $value)
        {
            $action = Fonctions::colActionTable("'user',$value->id");

            $bodyListUsers = $bodyListUsers.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.$value->name.'</td>
            <td>'.$value->surname.'</td>
            <td>'.$value->sexe.'</td>
            <td>'.$value->telephone.'</td>
            <td>'.$value->email.'</td>
            <td>'.$value->id.'</td>
            <td>'.$value->statut.'</td>
            <td>'.$action.'</td>
            </tr>';
        }
        return $bodyListUsers;
    }
}