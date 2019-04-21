<?php

namespace App\Http\Controllers;

use App\Models\Message_user;
use Illuminate\Http\Request;

class MessageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$message_list
    }

    public function readInbox(Request $request)
    {
        if(!empty($request->id))
        {
            $id = $request->id;
            $newStatut = 1;
            return $this->updateStatutMesUser($id,$newStatut);
        }
        else
            return response()->json(['error'=>'erreur']);
    }
    public function deleteInbox(Request $request)
    {
        if(!empty($request->id))
        {
            $id = $request->id;
            $newStatut = -1;
            return $this->updateStatutMesUser($id,$newStatut);
        }
        else
            return response()->json(['error'=>'erreur']);
    }

    public function updateStatutMesUser($id,$newStatut)
    {
        $result = message_user::updateStatut($id,$newStatut);
        if($result)
            return response()->json(['success'=>'ok']);
        return response()->json(['error'=>'erreur']);

    }

    public function loadListMessage(Request $request)
    {
        $content = '$message_list';
        $idUser = \Auth::user()->id;

        $content = message_user::loadListMessage($idUser);

        if($content)
            return $content;
        return response()->json(['error'=>'erreur']);
    }

    public function loadMessageContent(Request $request)
    {
        $content = '';
        $idOpeUserMes = $request->id;

        $content = message_user::loadMessage($idOpeUserMes);

        if($content)
            return $content;
        return response()->json(['error'=>'erreur']);
    }
}
