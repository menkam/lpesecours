<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fonctions;
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



    public static function updateStatut($id, $newStatut)
    {
        if(!empty($id) && !empty($newStatut))
        {
            $date = Fonctions::getCurentDate();
            return DB::update("UPDATE message_user SET statut='$newStatut', updated_at='$date' WHERE id='$id';");
        }
        return 0;
    }

    public static function loadListMessage($idUser)
    {
        $pages = '';
        $onClick = '';
        $lue = '';
        $transfere = '';
        $pieceJointe = '';

        $inbox = Message::getInbox('TCH', $idUser, ">= '0'");
        $countMsg = count($inbox);

        foreach ($inbox as $value) {

            $infoUser = $value->name . ' ' . $value->surname;
            $dateTime = $value->created_at;
            $idOpeUserMes = (int)$value->id_ope_user;
            //$transfere = '<span class="message-flags"><i class="ace-icon fa fa-reply light-grey"></i></span>';
            //$pieceJointe = '<span class="attachment"><i class="ace-icon fa fa-paperclip"></i></span>';
            $objet = $value->objet;
            $onClick = 'onclick="loadContentMessage(\'' . $idOpeUserMes . '\')"';
            if ($value->statut == '0')
            {
                $lue = "message-unread";
                $onClick = 'onclick="loadContentMessage(\'' . $idOpeUserMes . '\');lectureInbox(\''.$idOpeUserMes.'\')"';
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

    public static function loadMessage($idOpeUserMes)
    {
        $pages = '';
        $pieceJointe = '';

        $messages = Message::getMessage($idOpeUserMes);

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
}
