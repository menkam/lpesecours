<?php

namespace App\Http\Controllers;

use App\Models\message_user;
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

        $message_list = message_user::loadListMessage($idUser);

        if($message_list)
            return view('messages\inbox', compact('message_list'));
        return view('messages\inbox' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public  function sendMessage(Request $request)
    {

        $sol =  '';
        $type = 'TCH';
        $objet = $request->objet;
        $libelle = $request->libelle;
        $emailRecive = $request->email;
        $sol = Message::newMessage($type,$objet,$libelle,$emailRecive);
        if($sol)
        {
            return response()->json(['success'=>'Message envoyé']);
        }
        else
            return response()->json(['error'=>'erreur d\'envoie']);
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
