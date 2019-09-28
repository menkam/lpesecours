<?php

namespace App\Http\Controllers\api;

use App\Models\Menu;
use App\Models\Mobile_money;
use App\Fonctions;
use App\Models\Monnaie;
use DB;
use function GuzzleHttp\json_encode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getMenus() {
        $isSousMenus = Menu::isSMenu2(4);
        $menu = "{title: 'Dashboard', url: '/dashboard', icon: 'home'},<br>";
        $page = "";
        $menus1 = Menu::getAllLine(0);
        /*foreach ($menus as $val) {
            //$menu = $menu."INSERT or IGNORE INTO menus VALUES ($val->id, $val->idparent, $val->idfils, '$val->libelle', '$val->libelle', '$val->icon', $val->rang, $val->groupeuser);<br>";
            if(Menu::isSMenu2($val->id)){
                $menu = $menu."{title: '$val->libelle',children: [";
                $ssmenus = Menu::getSMenu2($val->id);
                foreach ($ssmenus as $val2) {
                    if(Menu::isSMenu2($val2->id)) {
                        $sssmenu = Menu::getSMenu2($val2->id);
                        foreach ($sssmenu as $val3) {
                            $page = $page."ionic g pages pages/$val->libelle /$val3->libelle<br>";
                        }
                    }else {
                        $menu = $menu."{title: '$val2->libelle',url: '/$val->libelle /$val2->libelle',icon: '$val2->icon'},<br>";
                        $page = $page."ionic g pages pages666$val->libelle 666$val2->libelle<br>";
                    }
                }
                $menu = $menu."]},<br>";

            }else {
                $menu = $menu."{title: '$val->libelle',url: '/$val->libelle',icon: '$val->icon'},<br>";
                $page = $page."ionic g pages pages/$val->libelle<br>";
            }
                //$menu = $menu."ionic g pages pages999$val->libelle<br>";
                //$menu = $menu."{title: '$val->libelle',url: '/$val->libelle',icon: '$val->icon'},<br>";
        }*/



        foreach ($menus1 as $menu1) {
            if (Menu::isSMenu2($menu1->id)) {
                $menu = $menu."{title: '$menu1->libelle',children: [";
                $menu2 = Menu::getSMenu2($menu1->id);
                foreach ($menu2 as $menu2) {
                    if(Menu::isSMenu2($menu2->id)) {
                        $menu = $menu."{title: '$menu2->libelle',url: '/$menu1->libelle/tab$menu2->libelle',icon: '$menu2->icon'},";
                    } else {
                        $menu = $menu."{title: '$menu2->libelle',url: '/$menu1->libelle/$menu2->libelle',icon: '$menu2->icon'},";
                    }
                }
                $menu = $menu."]},<br>";
                if (Menu::isSMenu2($menu1->id)) {

                } else {
                    $menu = $menu."{title: '$menu1->libelle',url: '/$menu1->libelle ,icon: '$menu1->icon'},<br>";
                }

            } else {
                $menu = $menu."{title: '$menu1->libelle',url: '/$menu1->libelle ,icon: '$menu1->icon'},<br>";
            }

        }

        dd($isSousMenus);

        return $menu;
        //return json_encode([$menu,$page]);
    }

    public function getListMomo() {
        $listJson = [];
        $totalEC2[0] = 200000;
        $commission[0] = 23753;
        $msgStatut = '';
        $nbr=1;
        $compteur = 0;

        $list = Mobile_money::getAllLine();
        foreach ($list as $val) {
            $espece = Monnaie::somme($val->espece);
            $total_compte_espece = ($val->compte_momo + $val->compte2 + $espece);
            $totalEC2[$nbr] = (integer)$espece + (integer)$val->compte_momo + (integer)$val->compte2;
            $commission[$nbr] = (integer)$val->commission;
            $diffCom = (integer)$val->commission - $commission[$nbr-1];
            $margeEC2 =  ($totalEC2[$nbr] +(integer)$val->frais_transfert - ($totalEC2[$nbr-1] + (integer)$val->pret));
            if($margeEC2<0) $valMargerEC2 = ["alert" => 1, "val" => Fonctions::formatPrix($margeEC2)];
            elseif($margeEC2>=0) $valMargerEC2 = ["alert" => 0, "val" => Fonctions::formatPrix($margeEC2)];
            $Supplement = ($totalEC2[$nbr]-((integer)$val->fond));
            if((((integer)$val->fond+(integer)$val->pret))<=$totalEC2[$nbr]) $msgStatut = 1;
            elseif((((integer)$val->fond+(integer)$val->pret))>$totalEC2[$nbr]) $msgStatut = 0;            
            $bilan = $val->fond - $total_compte_espece;
            if($compteur >= count($list) - 15) {
                $listJson[] = [
                  "id" =>  $val->id,
                  "date" =>  $val->date,
                  "fond" =>  Fonctions::formatPrix($val->fond),
                  "pret" =>  Fonctions::formatPrix($val->pret),
                  "espece" =>  Fonctions::formatPrix($espece),
                  "compte" =>  Fonctions::formatPrix($val->compte_momo + $val->compte2),
                  "commission" =>  Fonctions::formatPrix($val->commission),
                  "totalEC" =>  Fonctions::formatPrix($total_compte_espece),
                  "margeEC" =>  $valMargerEC2,
                  "diffCom" =>  Fonctions::formatPrix($diffCom),
                  "supplements" =>  Fonctions::formatPrix($Supplement),
                  "statut" =>  $msgStatut,
                ];
            }
            $compteur++;
            $nbr++;
        }
        $sol['momo'] = $listJson;
        //return json_encode([$sol]);
        //dd($sol);
        return $sol;
    }
    
    public function newCompteMomo() {
        $solution = 0;
        $last_info = Mobile_money::getAllLine('1',null,'ok');
        $exit = Mobile_money::isExcist(Request('date'));
        if(!$exit){
            $request = new Request();
            $request->replace([
                'date' => Request('date'),
                'fond' => $last_info->fond,
                'pret' => Request('pret'),
                'espece' => Request('espece'),
                'compte_momo' => Request('comptemomo'),
                'compte2' => Request('compteperso'),
                'frais_transfert' => 0,
                'commission' => Request('commission'),
            ]);
            try {
                $result = Mobile_money::createMomo($request);
                $solution = 2;
            } catch (Exception $e) {
                return json_encode([$e]);
            }
        } else {
            $solution = 1;
        }
        return json_encode($solution);
    }
    public function updateCompteMomo() {
        $solution = 0;
        $exit = Mobile_money::isExcist(Request('date'));
        if($exit){
            $request = new Request();
            $request->replace([
                'date' => Request('date'),
                'fond' => Request('fond'),
                'pret' => Request('pret'),
                'espece' => Request('espece'),
                'compte_momo' => Request('comptemomo'),
                'compte2' => Request('compteperso'),
                'frais_transfert' => 0,
                'commission' => Request('commission'),
            ]);
            try {
                $result = Mobile_money::updateMomo($request);
                $solution = 2;
            } catch (Exception $e) {
                return json_encode([$e]);
            }
        } else {
            $solution = 1;
        }
        return json_encode($solution);
    }

    public function getInfoCompte() {
        $sol1 = Mobile_money::getAllLine('1',Request('id'));
        $nombre = explode(":", $sol1->espece);

        $sol['momo'] = [
          "date" => $sol1->date,
          "fond" => $sol1->fond,
          "pret" => $sol1->pret,
          "espece" => Monnaie::somme($sol1->espece),
          "comptemomo" => $sol1->compte_momo,
          "compteperso" => $sol1->compte2,
          "commission" => $sol1->commission
        ];
        $sol['devise'] = [
            "dixMilles" => $nombre[0],
            "cinqMilles" => $nombre[1],
            "deuxMilles" => $nombre[2],
            "mille" => $nombre[3],
            "cinqCent" => $nombre[4],
            "cent" => $nombre[5],
            "cinquante" => $nombre[6],
            "vingtCinq" => $nombre[7]
        ];
        //return json_encode([$sol]);
        return $sol;
    }
}
