<?php

namespace App\Models;

use App\Fonctions;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tlist_message;

class Message extends Model
{
    protected $guarded = array();

    protected $fillable = [
   		'type_message',
   		'objet',
   		'libelle',
   		'statut'
   	];

   	protected $hidden = [
    ];

    public function type_message()
    {
        return $this->belongsToMany(Tlist_message::class);
    }


    protected $casts = [
        
    ];

    public static function showInfoNav($idUser, $type)
    {
        $erreur = 0;
        $sol = '';
        if(!empty($type))
        {
            if($type=='inbox')
            {
                $erreur = 1;
                $sol = Message::findInbox($idUser);
            }
            elseif($type=='notification')
            {
                $erreur = 1;
                $sol = Message::findNotification($idUser);
            }
        }
        return ([$erreur,$sol]);
    }

    public static function findInbox($id)
    {
        $ligne = '';
        $countMsg = 0;

        $idInbox = 0;
        $avatar = 'avatar.png';
        $nameSend = 'Alex';
        $object = 'Ciao sociis natoque penatibus et auctor';
        $dateSend = '17/04/2019 17:08';
        $ligne = '<li>
                <a href="#" class="clearfix" onclick="lectureInbox(\''.$idInbox.'\')">
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
