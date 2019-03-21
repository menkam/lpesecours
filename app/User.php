<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Tlist_acreditation;
use App\Models\Tlist_groupe_user;

class User extends Authenticatable
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

    public function groupe_user()
    {
        return $this->belongsToMany(Tlist_groupe_user::class);
    }

    public function acreditation()
    {
        return $this->belongsToMany(Tlist_acreditation::class);
    }

    /**
     *
     */
    public function authorizeAcreditation($acreditation)
    {
        if (is_array($acreditation)) {
            return $this->hasAnyAcreditation($acreditation) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasAcreditation($acreditation) || abort(401, 'This action is unauthorized.');
    }

    /**
     * Check multiple roles
     * @param array $acreditation
     */
    public function hasAnyAcreditation($acreditation)
    {
        return null !== $this->acreditation()->whereIn('acreditation', $acreditation)->first();
    }

    /**
     * Check one role
     * @param string $acreditation
     */
    public function hasAcreditation($acreditation)
    {
        return null !== $this->acreditation()->where('acreditation', $acreditation)->first();
    }

    public function getAcreditation(){
        //$this->user()->id;
        return ('acreditation');
    }


    /**
     *
     */
    public function authorizeGroupe_user($groupe_user)
    {
        if (is_array($groupe_user)) {
            return $this->hasAnyAcreditation($groupe_user) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasAcreditation($groupe_user) || abort(401, 'This action is unauthorized.');
    }

    /**
     * Check multiple roles
     * @param array $groupe_user
     */
    public function hasAnyGroupe_user($groupe_user)
    {
        return null !== $this->groupe_user()->whereIn('groupe_user', $groupe_user)->first();
    }

    /**
     * Check one role
     * @param string $acreditation
     */
    public function hasGroupe_user($groupe_user)
    {
        return null !== $this->groupe_user()->where('groupe_user', $groupe_user)->first();
    }

    public function getGroupe_user(){
        return ('groupe_user');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}