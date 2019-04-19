<?php

namespace App\Http\Controllers;

use App\Models\Ope_user_me;
use Illuminate\Http\Request;

class OpeUserMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $result = Ope_user_me::updateStatut($id,$newStatut);
        if($result)
            return response()->json(['success'=>'ok']);
        return response()->json(['error'=>'erreur']);

    }
}
