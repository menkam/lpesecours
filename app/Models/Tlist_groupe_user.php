<?php

namespace App\Models;

use DB;
use App\Models\User;

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
            $onclickUpdate = 'onclick="loadContentUpdateBilan(\'momo\',\''.$value->id.'\');"';
            $onclickView = 'onclick="loadContentUpdateBilan(\'momo\',\''.$value->id.'\');"';
            $onclickDelete = 'onclick="updateStatutBilan(\'momo\',\''.$value->id.'\');"';


            $bodyListGroupeUser = $bodyListGroupeUser.'<tr><td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
            <td>'.$value->id.'</td>
            <td>'.$value->code.'</td>
            <td>'.$value->libelle.'</td>
            <td>'.$value->statut.'</td>
            <td><div class="hidden-sm hidden-xs action-buttons">
            <a class="blue" href="#" '.$onclickUpdate.' data-toggle="modal" data-target="#modalView"><i class="ace-icon fa fa-search-plus bigger-130"></i></a>
            <a class="green" href="#" '.$onclickUpdate.' data-toggle="modal" data-target="#modalUpdate"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
            <a class="red" href="#" '.$onclickDelete.'  data-toggle="modal" data-target="#modalDelete"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></div>
            <div class="hidden-md hidden-lg"><div class="inline pos-rel">
            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i></button>
            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
            <li><a href="#" class="tooltip-info" '.$onclickView.' data-rel="tooltip" title="modaleAjouter" data-toggle="modal" data-target="#modalView">
            <span class="blue"><i class="ace-icon fa fa-search-plus bigger-120"></i></span></a></li>
            <li><a href="#" class="tooltip-success" '.$onclickUpdate.' data-rel="tooltip" title="Edit" data-toggle="modal" data-target="#modalUpdate">
            <span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
            <li><a href="#" class="tooltip-error" '.$onclickDelete.' data-rel="tooltip" title="modalDelete" data-toggle="modal" data-target="#modalDelete">
            <span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a></li></ul></div></div></td>
            </tr>';
            $numero++;
        }
        return $bodyListGroupeUser;
    }

}
