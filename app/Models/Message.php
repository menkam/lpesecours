<?php

namespace App\Models;

use App\Fonctions;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tlist_message;
use DB;

class Message extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'id',
   		'type_message',
   		'id_user_send',
   		'objet',
   		'libelle',
   		'statut'
   	];

   	protected $hidden = [
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    protected $casts = [
        
    ];

    public static function newMessage($type,$objet,$libelle,$emailRecive)
    {
        $type_message = Tlist_message::where('code', $type)->first();
        $userrecive = User::where('email', $emailRecive)->first();
        $userSend = \Auth::user()->id;

        $object = new Message();
        $object->type_message = $type_message['id'];
        $object->id_user_send = $userSend;
        $object->objet = $objet;
        $object->libelle = $libelle;
        $object->save();
        $object->users()->attach($userrecive);
        $id = $object->id;
        if($id)
            return $id;
        else
            return 0;
    }

    public static function showInfoNav($type,$typeMessage,$idUser,$statut)
    {
        $erreur = 0;
        $sol = '';
        if(!empty($type))
        {
            if($type=='inbox')
            {
                $erreur = 1;
                $sol = Message::findInbox($typeMessage,$idUser,$statut);
            }
            elseif($type=='notification')
            {
                $erreur = 1;
                $sol = Message::findNotification($idUser);
            }
        }
        return ([$erreur,$sol]);
    }

    public static function getInbox($typeMessages=null, $idUser=null, $statut=null)
    {
        $typeMessage = "";
        if($typeMessages=="TCH")
            $typeMessage = "(tlist_messages.code = '$typeMessages' OR tlist_messages.code = 'SYS')";
        else $typeMessage = "tlist_messages.code = '$typeMessages'";
        return DB::select("
            SELECT 
              users.id as id_user, 
              users.name, 
              users.surname, 
              users.photo, 
              messages.id as id_message, 
              messages.objet, 
              message_user.id as id_ope_user, 
              messages.created_at, 
              message_user.statut
            FROM 
              public.users, 
              public.message_user, 
              public.messages, 
              public.tlist_messages
            WHERE 
              message_user.message_id = messages.id AND
              messages.id_user_send = users.id AND
              messages.type_message = tlist_messages.id AND
              message_user.user_id = '$idUser' AND 
              ".$typeMessage." AND 
              message_user.statut ".$statut."
            ORDER BY
              messages.created_at DESC;");
    }
    public static function getMessage($idOpeUsermes=null, $statut=" >= '0'")
    {
        return DB::select("
            SELECT 
              users.name, 
              users.surname, 
              users.photo,
              users.email, 
              messages.objet, 
              messages.libelle, 
              message_user.statut, 
              messages.created_at, 
              message_user.updated_at
            FROM 
              public.users, 
              public.message_user, 
              public.messages
            WHERE 
              message_user.message_id = messages.id AND
              messages.id_user_send = users.id AND
              message_user.id = '$idOpeUsermes' AND 
              message_user.statut ".$statut.";");
    }

    public static function countInbox($typeMessage=null, $idUser=null, $statut=null)
    {

    }

    public static function findInbox($typeMessage,$idUser,$statut)
    {
        $ligne = '';
        $inbox = Message::getInbox($typeMessage, $idUser, $statut);
        $countMsg = count($inbox);

        foreach ($inbox as $value) {
            $idInbox = (int)$value->id_ope_user;
            $avatar = $value->photo;
            $nameSend = $value->name;
            $object = $value->objet;
            $dateSend = $value->created_at;

            $ligne = $ligne.'<li>
                    <a href="/inbox?'.md5('message').'='.$idInbox.'" class="clearfix" onclick="lectureInbox0(\''.$idInbox.'\')">
                        <img src="assets/images/avatars/'.$avatar.'" class="msg-photo" alt="'.$nameSend.'\'s Avatar" />
                        <span class="msg-body">
                            <span class="msg-title">
                                <span class="blue">'.$nameSend.':</span>
                                '.$object.'...
                            </span>
    
                            <span class="msg-time">
                                <i class="ace-icon fa fa-clock-o"></i>
                                <span>'.Fonctions::calculDuree($dateSend).'</span>
                            </span>
                        </span>
                    </a>
                </li>';
        }
        $sol = '<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">'.$countMsg.'</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            '.$countMsg.' Message(s)
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                '.$ligne.'
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="inbox">
                                See all messages
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>';
        return $sol;
    }
    public static function findNotification($id)
    {
        $sol = '<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            8 Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                                    <span class="pull-left">
                                                        <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                        New Comments
                                                    </span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="btn btn-xs btn-primary fa fa-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                                    <span class="pull-left">
                                                        <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                                                        New Orders
                                                    </span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                                                Followers
                                            </span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>';
        return $sol;
    }
}
