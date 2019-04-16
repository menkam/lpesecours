<?php

namespace App\Http\Controllers;

//use App\Models\Gestions;
use App\Fonctions;
use App\Models\Tlist_photo;
use Illuminate\Http\Response;
use Validator;
use App\Models\Mobile_money;
use App\Models\Photo;
use App\Models\Cachet;
use App\Models\Tlist_cachet;


use Illuminate\Http\Request;


class GestionsController extends Controller
{
    /**
     * Return View.
     */
    public function recetteMoMo()
    {
        $result = Mobile_money::infoUtile();
        $lastDate = $result[0];
        $lastFond = $result[1];
        $pret = $result[2];
        $lastComm = $result[3];
        $total = $result[4];
        $lastFond2 = $result[5];
        $courentdate = Fonctions::getCurentDate();

        return view("gestions/RecettesMoMo", compact('lastDate','lastFond','pret','lastComm','total','lastFond2','courentdate'));
    }
    public function recetteCachet()
    {
        $optionTypeCachet = Tlist_cachet::getOption();
        return view("gestions/RecettesCachet", compact('optionTypeCachet'));
    }
    public function recettePhoto()
    {
        $optionTypePhoto = Tlist_photo::getOption();
        return view("gestions/RecettesPhoto", compact('optionTypePhoto'));
    }

    public function depenseCachet(){ return view("gestions/DepensesCachet"); }
    public function depensePhoto(){ return view("gestions/DepensePhoto"); }

    public function bilanMoMo()
    {
        $resul = Mobile_money::showBilan();
        //dd($resul);
        $rowBilanMoMo = $resul[0];
        $somPret = $resul[1];
        $somFrais = $resul[2];
        $maxComm = $resul[3];
        $somMEC2 = $resul[4];
        $maxSup = $resul[5];
        $lastFond = $resul[6];
        $lastStatut = $resul[7];
        $lastTotal = $resul[8];

        return view("gestions/BilanMoMo", compact('rowBilanMoMo','somPret','somFrais','maxComm','somMEC2','maxSup','lastFond','lastStatut','lastTotal'));
    }
    public function bilanPhoto()
    {
        $resul = Photo::showBilan();
        $rowBilan = $resul[0];
        $somQte = $resul[1];
        $total = $resul[2];

        return view("gestions/BilanPhoto", compact('rowBilan','somQte','total'));
    }
    public function bilanCachet()
    {
        $resul = Cachet::showBilan();
        $rowBilan = $resul[0];
        $somQte = $resul[1];
        $total = $resul[2];

        return view("gestions/BilanCachet", compact('rowBilan','somQte','total'));
    }
    
    public function personnelle(){ return view("gestions/Personnelle");}

    public function loadBodyBilan(Request $request)
    {
        $typeGestion = $request->typeGestion;
        if ($typeGestion=="momo") return response()->json(Mobile_money::showBilan());
        else if ($typeGestion=="photo") return response()->json(Photo::showBilan());
        else if ($typeGestion=="cachet") return response()->json(Cachet::showBilan());

    }


    /**
     * From Request AJAX
     */
    public function saveRecetteGlobalMomo(Request $request)
    {
        $bilan = $request->bilan;
        $requests = explode(":", $bilan);
        if(count($requests)==8)
            return response()->json($requests);
        return response()->json(['error'=>'Le Format de Saisie de Données est Invalide !!!']);
    }

    public function saveRecetteMoMo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'fond' => 'required|integer',
            'pret' => 'required|integer',
            'espece' => 'required|integer',
            'compte_momo' => 'required|integer',
            'compte2' => 'required|integer',
            'frais_transfert' => 'required|integer',
            'commission' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Mobile_money::create([
                'date' => $request['date'],
                'fond' => $request['fond'],
                'pret' => $request['pret'],
                'espece' => $request['espece'],
                'compte_momo' => $request['compte_momo'],
                'compte2' => $request['compte2'],
                'frais_transfert' => $request['frais_transfert'],
                'commission' => $request['commission'],
            ]);
            if($save->id)
                return response()->json(['success'=>'Added new records.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function saveRecettePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Photo::create([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire'],
            ]);
            if($save)
                return response()->json(['success'=>'Added new records.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }
    public function saveRecetteCachet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);

        if ($validator->passes()) {
            $save = Cachet::create([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire'],
            ]);
            if($save)
                return response()->json(['success'=>'Added new records.']);
            return response()->json(['error'=>$save]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function deleteRecetteMomo(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|integer']);
        if ($validator->passes()) {
            $update = Mobile_money::find($request->id)->update(['statut' => '-1']);
            if($update)
                return response()->json(['success'=>'Suppression réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function deleteRecettePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|integer']);
        if ($validator->passes()) {
            $update = Photo::find($request->id)->update(['statut' => '-1']);
            if($update)
                return response()->json(['success'=>'Suppression réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function deleteRecetteCachet(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required|integer']);
        if ($validator->passes()) {
            $update = Cachet::find($request->id)->update(['statut' => '-1']);
            if($update)
                return response()->json(['success'=>'Suppression réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function updateStatutBilan(Request $request)
    {
        $page = 'ras';
        $sol = '';
        if ($request['typeGestion']=="momo") $sol = Mobile_money::getAllLine('1',$request['id']);
        elseif ($request['typeGestion']=="photo") $sol = Photo::getAllLine($request['id']);
        elseif ($request['typeGestion']=="cachet") $sol = Cachet::getAllLine($request['id']);

        $page ='<input type="hidden" id="id" value="'.$sol->id.'" name="id">';

        return $page;
    }

    public function getOptionTypeCachet(Request $request)
    {
        $optionTypeCachet = Tlist_cachet::getOption();
        return response()->json($optionTypeCachet);
    }
    public function getOptionTypePhoto(Request $request)
    {
        $optionTypePhoto = Tlist_photo::getOption();
        return response()->json($optionTypePhoto);
    }

    public function calculatrice(Request $request)
    {
        $opps = explode("+", (string)$request->cal_opp);
        $sol = '0';
        
        if(count($opps)==0)
            $sol = '0';
        if(count($opps)==1)
            $sol = (int) $opps[0];
        elseif(count($opps)>1){
            for($i=0; $i<count($opps); $i++)
            $sol += (int) $opps[$i];
        }
        $val = Fonctions::formatPrix($sol);
        echo $val;
        //echo $sol;
    }

}