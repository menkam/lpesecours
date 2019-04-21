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

        $message_list = Message_user::loadListMessage($idUser);

        if($message_list)
            return view('messages/inbox', compact('message_list'));
        return view('messages/inbox');
    }

  

    public  function sendMessage(Request $request)
    {

        $sol =  '';
        $type = 'TCH';
        $objet = $request->objet;
        $libelle = $request->libelle;
        $emailRecive = $request->email;
        $sol = Message::newMessage(
            new Request([
                'type'=>$type,
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
}
