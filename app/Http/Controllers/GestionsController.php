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

    public function updateRecetteMomo(Request $request)
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
            $update = Mobile_money::find($request->id)->update([
                'date' => $request['date'],
                'fond' => $request['fond'],
                'pret' => $request['pret'],
                'espece' => $request['espece'],
                'compte_momo' => $request['compte_momo'],
                'compte2' => $request['compte2'],
                'frais_transfert' => $request['frais_transfert'],
                'commission' => $request['commission'],
            ]);
            if($update)
                return response()->json(['success'=>'Modification réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function updateRecettePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);
        if ($validator->passes()) {
            $update = Photo::find($request->id)->update([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire']
            ]);
            if($update)
                return response()->json(['success'=>'Modification réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function updateRecetteCachet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'type' => 'required|integer',
            'nombre' => 'required|integer',
            'prix_unitaire' => 'required|integer',
        ]);
        if ($validator->passes()) {
            $update = Cachet::find($request->id)->update([
                'date' => $request['date'],
                'type' => $request['type'],
                'nombre' => $request['nombre'],
                'prix_unitaire' => $request['prix_unitaire']
            ]);
            if($update)
                return response()->json(['success'=>'Modification réussite.']);
            return response()->json(['error'=>'error']);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function getRecetteMomo($id)
    {
        $sol = Mobile_money::getAllLine('1',$id);
        $page = "ras";
        $page ='
            <input type="hidden" id="id" value="'.$sol->id.'" name="id">
            <input type="hidden" id="date" value="'.$sol->date.'" value="19" name="date">
            <div class="form-group"  style="">
                <label class="control-label" for="fond">Fond</label>
                <input type="number" name="fond" id="fond" value="'.$sol->fond.'" class="form-control" data-error="Entrer le Fond de MoMO." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="pret">Prêt (+/-)</label>
                <input type="number" name="pret" id="pret" value="'.$sol->pret.'" class="form-control" data-error="Entrer le montant de Prêt (-/+)." required >
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group"  style="">
                <label class="control-label" for="espece">Espèce</label>
                <input type="number" name="espece" id="espece" value="'.$sol->espece.'" class="form-control" data-error="Entrer le montant en Espèce." required >
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group"  style="">
                <label class="control-label" for="compte_momo">CompteMomo</label>
                <input type="number" name="compte_momo" id="compte_momo" value="'.$sol->compte_momo.'" class="form-control" data-error="Entrer Le montant se trouvant dans le compte MoMo." required >
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group"  style="">
                <label class="control-label" for="compte2">Compte2</label>
                <input type="number" name="compte2" id="compte2" value="'.$sol->compte2.'" class="form-control" data-error="Entrer le montant du second compte." required >
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group"  style="">
                <label class="control-label" for="frais_transfert">FraisTransfère</label>
                <input type="number" name="frais_transfert" id="frais_transfert" value="'.$sol->frais_transfert.'" class="form-control" data-error="Entrer le montant total des frais de transaction du second compte." required >
                <div class="help-block with-errors"></div>
            </div>
                <div class="form-group"  style="">
                <label class="control-label" for="commission">Commission</label>
                <input type="number" name="commission" id="commission" value="'.$sol->commission.'" class="form-control" data-error="Entrer la valeur des Commissions." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }
    public function getRecettePhoto($id)
    {
        $sol = Photo::getAllLine($id);
        $page = "ras";
        $page = '
            <input type="hidden" value="'.$sol->id.'" id="id" name="id">
            <input type="hidden" value="'.$sol->date.'" id="date" name="date">
            <div class="form-group"  style="">
                <label class="control-label" for="type">Type de cachet</label>
                <select name="type" id="type" class="form-control" data-error="Choisir le type de photo." required >
                    '.Tlist_photo::getOption($sol->type).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="number" name="nombre" id="nombre" value="'.$sol->nombre.'" class="form-control" data-error="Entrer le nombre de photo." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="prix_unitaire">Prix Unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" value="'.$sol->prix_unitaire.'" class="form-control" data-error="Entrer le prix unitaire." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
    }
    public function getRecetteCachet($id)
    {
        $sol = Cachet::getAllLine($id);
        $page = '
            <input type="hidden" value="'.$sol->id.'" id="id" name="id">
            <input type="hidden" value="'.$sol->date.'" id="date" name="date">
            <div class="form-group"  style="">
                <label class="control-label" for="type">Type de cachet</label>
                <select name="type" id="type" class="form-control" data-error="Choisir le type de cachet." required >
                    '.Tlist_cachet::getOption($sol->type).'
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="number" name="nombre" id="nombre" value="'.$sol->nombre.'" class="form-control" data-error="Entrer le nombre de cachet." required >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group"  style="">
                <label class="control-label" for="prix_unitaire">Prix Unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" value="'.$sol->prix_unitaire.'" class="form-control" data-error="Entrer le prix Unitaire." required >
                <div class="help-block with-errors"></div>
            </div>
        ';
        return $page;
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

    public function loadContentUpdateBilan(Request $request)
    {
        $page = 'ras';
        if ($request['typeGestion']=="momo")        $page = $this->getRecetteMomo($request['id']);
        elseif ($request['typeGestion']=="photo")   $page = $this->getRecettePhoto($request['id']);
        elseif ($request['typeGestion']=="cachet")  $page = $this->getRecetteCachet($request['id']);
        //return response()->json($page);
        return $page;
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