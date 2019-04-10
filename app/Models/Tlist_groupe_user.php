<?php

namespace App\Models;

use DB;
use App\Models\User;
use App\Fonctions;

use Illuminate\Database\Eloquent\Model;


class Tlist_groupe_user extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'code',
   		'libelle',
   		'statut'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function getOptionGroupeUser()
    {
        $groupeUser = DB::select("
            SELECT 
              tlist_groupe_users.id, 
              tlist_groupe_users.code, 
              tlist_groupe_users.libelle
            FROM 
              public.tlist_groupe_users
            WHERE 
              tlist_groupe_users.statut = '1' AND 
              tlist_groupe_users.id != '1' AND
              tlist_groupe_users.id != '6' AND
              tlist_groupe_users.id != '2';
        ");

        $option = '<option value="">-----------------</option>';
        foreach ($groupeUser as $value)
        {
            $option = $option.'<option value="'.$value->id.'">'.$value->code.'=>['.$value->libelle.']</option>';
        }
        return $option;
    }

    /**
     * show list list Groupe user
     */
    public static function ListGroupeUsers()
    {
        $bodyListGroupeUser = '';
        $numero = 1;
        foreach (Tlist_groupe_user::all() as $value)
        {
            $action = Fonctions::colActionTable();


            $bodyListGroupeUser = $bodyListGroupeUser.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.$value->code.'</td>
            <td>'.$value->libelle.'</td>
            <td>'.$value->statut.'</td>
            <td>'.$action.'</td>
            </tr>';
        }
        return $bodyListGroupeUser;
    }

}
