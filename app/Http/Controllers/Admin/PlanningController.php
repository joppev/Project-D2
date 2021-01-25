<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Planning;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.planning.planning');
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
        $this->validate($request,[


        ]);
        $planning = new Planning();
        $planning->gebruikerID = (int)$request->user_id;
        $planning->kadeID = (int)$request->kade_id;
        $planning->tijdTabelID = (int)$request->tijd_id;
        $planning->proces = $request->proces;
        $planning->ladingDetails = $request->lading;
        $planning->aantal = $request->aantal;

        $status = $request->status;

        if($status === "1"){
            $planning->isAanwezig = false;
            $planning->isBezig = false;
            $planning->isAfgewerkt = true;
        } elseif($status === "2"){
            $planning->isAanwezig = false;
            $planning->isBezig = true;
            $planning->isAfgewerkt = false;
        }
        elseif($status === "3"){
            $planning->isAanwezig = false;
            $planning->isBezig = false;
            $planning->isAfgewerkt = true;
        } else{
            $planning->isAanwezig = false;
            $planning->isBezig = false;
            $planning->isAfgewerkt = false;
        }

        $planning->save();
        return response()->json([
            'type' => 'success',
            'text' => "planning is toegevoegd. "
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function show(Planning $planning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function edit(Planning $planning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planning $planning)
    {

        $this->validate($request,[


        ]);

        $planning->gebruikerID = (int)$request->user_id;
        $planning->kadeID = (int)$request->kade_id;
        $planning->tijdTabelID = (int)$request->tijd_id;
        $planning->proces = $request->proces;
        $planning->ladingDetails = $request->lading;
        $planning->aantal = $request->aantal;

        $status = $request->status;

        if($status === "1"){
            $planning->isAanwezig = false;
            $planning->isBezig = false;
            $planning->isAfgewerkt = true;
        } elseif($status === "2"){
            $planning->isAanwezig = false;
            $planning->isBezig = true;
            $planning->isAfgewerkt = false;
        }
        elseif($status === "3"){
            $planning->isAanwezig = false;
            $planning->isBezig = false;
            $planning->isAfgewerkt = true;
        } else{
            $planning->isAanwezig = false;
            $planning->isBezig = false;
            $planning->isAfgewerkt = false;
        }

        $planning->save();
        return response()->json([
            'type' => 'success',
            'text' => "planning is aangepast. "
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planning $planning)
    {
        $planning->delete();
        return response()->json([
            'type' => 'success',
            'text' => "planning is verwijderd."
        ]);
    }

    public function qryPlannings(){

        $planningen  = DB::table('plannings')
            ->join('tijd_tabels', 'plannings.tijdTabelID', '=', 'tijd_tabels.id')
            ->join('users', 'plannings.gebruikerID', '=', 'users.id')
            ->join('bedrijfs', 'users.bedrijfs_id', '=', 'bedrijfs.id')
            ->join('nummerplaats', 'bedrijfs.id', '=', 'nummerplaats.bedrijfID')
            ->join('kades', 'plannings.kadeID', '=', 'kades.id')
            ->select('plannings.*','kades.kadenaam as kadenaam','tijd_tabels.startTijd as startTijd','tijd_tabels.stopTijd as stopTijd','bedrijfs.bedrijfsnaam as bedrijfsnaam', 'users.voornaam as voornaam', 'users.naam as naam','nummerplaats.plaatcombinatie as plaatcombinatie')

            ->get();


        Json::dump($planningen);

        return $planningen;

    }

    public function qryPlanningsUsers()
    {
        $users = DB::table('users')
            ->where('isChauffeur','=',true)
            ->get();

        Json::dump($users);
        return $users;
    }
    public function qryPlanningsKades()
    {
        $kades = DB::table('kades')
            ->get();

        Json::dump($kades);
        return $kades;
    }
    public function qryPlanningsTijdtabels()
    {
        $tijdtabels = DB::table('tijd_tabels')
            ->get();

        Json::dump($tijdtabels);
        return $tijdtabels;
    }

}
