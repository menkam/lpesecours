<?php

namespace App\Http\Controllers;

use App\Models\Message_user;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = '';
        $idUser = \Auth::user()->id;

        $message_inbox = Message_user::loadListMessage($idUser,'inbox');
        $message_send = Message_user::loadListMessage($idUser,'send');
        $message_draft = Message_user::loadListMessage($idUser,'draft');

        if($message_inbox)
            return view('messages/inbox', compact(['message_inbox','message_send','message_draft']));
        return view('messages/inbox');
    }

  

    public  function sendMessage(Request $request)
    {

        $sol =  '';
        $type_message = $request->type_message;
        $objet = $request->objet;
        $libelle = $request->libelle;
        $emailRecive = $request->email;
        $sol = Message::newMessage(
            new Request([
                'type_message'=>$type_message,
                'objet'=>$objet,
                'libelle'=>$libelle,
                'emailRecive'=>$emailRecive
            ])
        );
        return $sol;
    }

    public function showInfoNav(Request $request)
    {

        $typeMessage='TCH';
        $statut= "= '0'";

        $idUser = \Auth::user()->id;
        $type = $request->type;
        if($idUser)
        {
            $infoMenus = Message::showInfoNav($type,$typeMessage,$idUser,$statut);
            if($infoMenus[0])
            {
                return response()->json(['success'=>$infoMenus[1]]);
            }
            else
                return response()->json(['error'=>'erreur infoMenu']);
        }
        else
            return response()->json(['error'=>'erreur idUser']);

    }
    public function loadMessageContent(Request $request)
    {
        $content = '';
        $idUserSent = $request->id;

        $content = message::loadMessage($idUserSent);

        if($content)
            return $content;
        return response()->json(['error'=>'erreur']);
    }
}
