<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fonctions;
use Validator;
use App\FichiersCSV;
use App\Models\Message;
use App\Models\User;
use App\Models\Operation;
use DB;

class Message_user extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id',
   		'user_id',
   		'message_id',
   		'statut'
   	];

   	protected $hidden = [
    ];

    protected $casts = [
        
    ];


    public static function saveMessage_user()
    {
        $lignes = array();
        $rows = self::getAllLine();
        $lignes[] = array('user_id','message_id','statut','created_at','updated_at');
        foreach ($rows as $val)
        {
            $lignes[] = array(
                $val->user_id,
                $val->message_id,
                $val->statut,
                $val->created_at,
                $val->updated_at
            );
        }
        //dd($lignes);
        return FichiersCSV::ecriture("message_user", $lignes);
    }
    public static function getAllLine($id = null, $statut=null)
    {
        return DB::select("SELECT * FROM public.message_user;");
    }
    public static function updateMesUser($idUser, $idMsg)
    {
        if(!empty($idUser) && !empty($idMsg))
        {
            $date = Fonctions::getCurentDate();
            return DB::update("
                UPDATE message_user
                   SET created_at = '$date', updated_at = '$date'
                WHERE user_id = '$idUser' AND message_id = '$idMsg';
            ");
        }
        return 0;
    }
    public static function updateStatut($id, $newStatut)
    {
        if(!empty($id) && !empty($newStatut))
        {
            $date = Fonctions::getCurentDate();
            return DB::update("UPDATE message_user SET statut='$newStatut', updated_at='$date' WHERE id='$id';");
        }
        return 0;
    }

    public static function loadListMessage($idUser,$type)
    {
        $pages = '';
        $onClick = '';
        $lue = '';
        $transfere = '';
        $pieceJointe = '';

        $messages = Message::getContentMessage('TCH', $type, $idUser, ">= '0'");
        $countMsg = count($messages);

        //dd($messages);

        foreach ($messages as $value) {

            $infoUser = $value->name . ' ' . $value->surname;
            $dateTime = $value->created_at;
            $idUserSent = (int)$value->id_user;
            $idMesUser = (int)$value->id_mes_user;
            //$transfere = '<span class="message-flags"><i class="ace-icon fa fa-reply light-grey"></i></span>';
            //$pieceJointe = '<span class="attachment"><i class="ace-icon fa fa-paperclip"></i></span>';
            $objet = $value->objet;
            $onClick = 'onclick="loadContentMessage(\'' . $idUserSent . '\')"';
            if ($value->statut == '0')
            {
                $lue = "message-unread";
                $onClick = 'onclick="loadContentMessage(\'' . $idUserSent . '\');lectureInbox(\''.$idMesUser.'\')"';
            }

            $pages = $pages . '<div class="message-item ' . $lue . '">
                            <label class="inline">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                            <!--i class="message-star ace-icon fa fa-star orange2"></i>
                            <i class="message-star ace-icon fa fa-star-o light-grey"></i-->
                            <span class="sender" title="NomPrenomSend">' . $infoUser . '</span>
                            <span class="pull-right">' . $dateTime . '</span>
                            ' . $pieceJointe . '
                            <span class="summary" '.$onClick.'>
                                ' . $transfere . '
                                <span class="text">
                                    ' . $objet . '
                                </span>
                            </span>
                        </div>';
        }
        return $pages;
    }
}
