<?php

namespace App\Models;

use App\Fonctions;
use Validator;
use App\FichiersCSV;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tlist_message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public static function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'type_message' => 'required|string',
            'objet' => 'required|string',
            'objet' => 'required|string',
            'libelle' => 'required|string',
            'emailRecive' => 'required|email'
        ]);
    }

    public static function newMessage(Request $request)//$type,$objet,$libelle,$emailRecive
    {
        //echo($request->type);
        $type = $request->type_message;
        $objet = $request->objet;
        $libelle = $request->libelle;
        $emailRecive = $request->emailRecive;

        $type_message = Tlist_message::where('code', $type)->first();
        $userrecive = User::where('email', $emailRecive)->first();
        $userSend = \Auth::user()->id;

        $validator = self::validator($request);
        if ($validator->passes()) {
            if(!empty($userrecive['id']))
            {
                if($userrecive['id']!=$userSend)
                {
                    $object = new Message();
                    $object->type_message = $type_message['id'];
                    $object->id_user_send = $userSend;
                    $object->objet = $objet;
                    $object->libelle = $libelle;
                    $object->save();
                    $object->users()->attach($userrecive);
                    $idMsg = $object->id;
                    if($idMsg)
                    {
                        $sol = Message_user::updateMesUser($userrecive['id'],$idMsg);
                        return response()->json(["success"=>'Message envoyer avec succès']);
                    }
                    else return response()->json(["error"=>'Message nom envoyé']);
                }
                else return response()->json(["error"=>'Impossible de s\'envoyer un msg']);
            }
            else return (["error"=>'Impossible de trover le destinataire']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public static function createMessage(Request $request)
    {
        $validator = self::validator($request);

        if ($validator->passes()) {
            $save = Message::create([
                'type_message' => $request['type_message'],
                'id_user_send' => $request['id_user_send'],
                'objet' => $request['objet'],
                'libelle' => $request['libelle'],
                'statut' => $request['statut'],
                'created_at' => $request['created_at'],
                'updated_at' => $request['updated_at'],
            ]);
            if($save)
                return response()->json(['success'=>'Added Date: '.$request['objet'].' -> success.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public static function createGlobalMessage($arrayss)
    {
        $sol = "<h1><u>Debut de la mise à jours Message</u></h1><br>";
        $arrays = explode(Fonctions::delimiteurRows(), $arrayss);
        dd($arrayss);
        for($i=0; $i<count($arrays); $i++)
        {
            $array = explode(Fonctions::delimiteurRows(), $arrays[$i]);
            if(count($array)==7)
            {
                if(!self::isExcist($array[0],$array[1],$array[2],$array[3]))
                {
                    $request = new Request([
                        'type_message' => $array[0],
                        'id_user_send' => $array[1],
                        'objet' => $array[2],
                        'libelle' => $array[3],
                        'statut' => $array[4],
                        'created_at' => $array[5],
                        'updated_at' => $array[6]
                    ]);
                    $sol = $sol.self::createMessage($request).'<br>';
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
        $sol = $sol."<h1><u>Fin de la mise à jours message</u></h1><br>";
        return $sol;
    }
    public static function saveMessage()
    {
        $lignes = array();
        $rows = self::getAllLine();
        $lignes[] = array('type_message','id_user_send','objet','libelle','statut','created_at','updated_at');
        foreach ($rows as $val)
        {
            $lignes[] = array(
                $val->type_message,
                $val->id_user_send,
                $val->objet,
                $val->libelle,
                $val->statut,
                $val->created_at,
                $val->updated_at
            );
        }
        //dd($lignes);
        return FichiersCSV::ecriture("message", $lignes);
    }
    public static function isExcist($type_message,$id_user_send,$objet,$libelle)
    {
        return DB::select("SELECT COUNT(date) FROM messages WHERE type_message='$type_message' AND id_user_send='$id_user_send' AND objet='$objet' AND libelle='$libelle';")[0]->count;
    }

    public static function getAllLine($id = null, $statut=null)
    {
        return DB::select("SELECT * FROM public.messages;");
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
              message_user.created_at, 
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
    public static function getContentMessage($typeMessages=null, $type, $idUser=null, $statut=null)
    {
        $typeMessage = "";
        if($typeMessages=="TCH")
            $typeMessage = "(tlist_messages.code = '$typeMessages' OR tlist_messages.code = 'SYS')";
        else $typeMessage = "tlist_messages.code = '$typeMessages'";
        $condition = '';
        if($type=='inbox') $condition = "message_user.user_id = '$idUser' AND";
        elseif($type=='send') $condition = "messages.id_user_send = '$idUser' AND";
        elseif($type=='draft') $condition = "messages.id_user_send = '$idUser' AND";
        return DB::select("
            SELECT 
              users.id as id_user, 
              users.name, 
              users.surname, 
              users.photo, 
              messages.id as id_message, 
              messages.objet, 
              message_user.id as id_mes_user, 
              message_user.created_at, 
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
              ".$condition." 
              ".$typeMessage." AND 
              message_user.statut ".$statut."
            ORDER BY
              messages.created_at DESC;");
    }

    public static function getMessage($idUserSent=null, $idUserRecive=null, $statut=" >= '0'")
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
              message_user.created_at, 
              message_user.updated_at 
            FROM 
              public.users, 
              message_user,
              public.messages
            WHERE 
              message_user.message_id = messages.id AND
              users.id = messages.id_user_send AND
              message_user.message_id IN(
                SELECT 
                  distinct(messages.id)
                FROM 
                  public.message_user, 
                  public.messages
                WHERE 
                  message_user.message_id = messages.id AND
                  (messages.id_user_send = '$idUserSent' AND message_user.user_id = '$idUserRecive') OR
                  (message_user.user_id = '$idUserSent' AND messages.id_user_send = '$idUserRecive')
         );");
    }

    public static function loadMessage($idUserSent)
    {
        $pages = '';
        $pieceJointe = '';
        $idUserRecive = Fonctions::getIdUser();

        $messages = self::getMessage($idUserSent,$idUserRecive);

        foreach ($messages as $value) {
            //if ($value->statut == '0') $lue = "message-unread";
            $infoUser = $value->name . ' ' . $value->surname;
            $email = $value->email;
            $photo = $value->photo;
            $dateTime = $value->created_at;
            $libelle = $value->libelle;
            //$transfere = '<span class="message-flags"><i class="ace-icon fa fa-reply light-grey"></i></span>';
            /*$pieceJointe = '<div class="attachment-title">
            <span class="blue bolder bigger-110">Attachments</span>
                    &nbsp;
                    <span class="grey">(2 files, 4.5 MB)</span>
                    <div class="inline position-relative">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            &nbsp;
                            <i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-lighter">
                            <li>
                                <a href="#">Download all as zip</a>
                            </li>
                            <li>
                                <a href="#">Display in slideshow</a>
                            </li>
                        </ul>
                    </div>
                </div>
            &nbsp;
                <ul class="attachment-list pull-left list-unstyled">
                    <li>
                        <a href="#" class="attached-file">
                            <i class="ace-icon fa fa-file-o bigger-110"></i>
                            <span class="attached-name">Document1.pdf</span>
                        </a>
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-download bigger-125 blue"></i>
                            </a>
                            <a href="#">
                                <i class="ace-icon fa fa-trash-o bigger-125 red"></i>
                            </a>
                        </span>
                    </li>
                    <li>
                        <a href="#" class="attached-file">
                            <i class="ace-icon fa fa-film bigger-110"></i>
                            <span class="attached-name">Sample.mp4</span>
                        </a>
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-download bigger-125 blue"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-trash-o bigger-125 red"></i>
                            </a>
                        </span>
                    </li>
                </ul>
                <div class="attachment-images pull-right">
                    <div class="vspace-4-sm"></div>
                    <div>
                        <img width="36" alt="image 4" src="assets/images/gallery/thumbs/thumb-4.jpg" />
                        <img width="36" alt="image 3" src="assets/images/gallery/thumbs/thumb-3.jpg" />
                        <img width="36" alt="image 2" src="assets/images/gallery/thumbs/thumb-2.jpg" />
                        <img width="36" alt="image 1" src="assets/images/gallery/thumbs/thumb-1.jpg" />
                    </div>
                </div>';*/

            $objet = $value->objet;

            $pages = $pages . '<div class="message-header clearfix">
                <div class="pull-left">
                    <!--span class="blue bigger-125"> Clik to open this message </span-->        
                    <div class="space-4"></div>        
                    <i class="ace-icon fa fa-star orange2"></i>        
                    &nbsp;
                    <img class="middle" alt="'.$infoUser.' Avatar" src="assets/images/avatars/'.$photo.'" width="32" />
                    &nbsp;
                    <a href="#" class="">'.$infoUser.'</a>&nbsp;
                    <a href="#" title="emailSend" class="sender">[ '.$email.' ]</a>
        
                    &nbsp;
                    <i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
                    <span class="time grey">'.$dateTime.'</span>    
                </div>        
                <div class="pull-right action-buttons">
                    <a href="#">
                        <i class="ace-icon fa fa-reply green icon-only bigger-130"></i>
                    </a>        
                    <a href="#">
                        <i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
                    </a>        
                    <a href="#">
                        <i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
                    </a>
                </div>
            </div>        
            <div class="hr hr-double"></div>  
            <div class="message-bar"><span class="blue bigger-125"><u>Objet</u> :</span> '.$objet.'</div>
            <div class="hr hr-dotted"></div> 
            <span class="blue bigger-125"><u>Contenu</u> : </span><br>
            <div id="message-body" class="message-body">'.$libelle.'</div><!-- message-body -->        
            <div class="hr hr-double"></div>        
            <div class="message-attachment clearfix">
                '.$pieceJointe.'
            </div>';
        }
        return $pages;
    }

    public static function countInbox($typeMessage=null, $idUser=null, $statut=null)
    {

    }

    public static function findInbox($typeMessage,$idUser,$statut)
    {
        $ligne = '';
        $inbox = self::getInbox($typeMessage, $idUser, $statut);
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
