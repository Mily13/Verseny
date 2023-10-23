<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\RoundModel;
use App\Models\CompetitorModel;
use Illuminate\Http\Request;

class CompetitorController extends Controller{
    public function insert(Request $request){
        $request->validate([
            'f_id' => 'required',
            'fordulo_id' => 'required',
        ]);

        $participating = CompetitorModel::isCompetitor($request->input('f_id'),$request->input('fordulo_id'));

        if (!$participating){
            CompetitorModel::create([
                'f_id' => $request->input('f_id'),
                'fordulo_id' => $request->input('fordulo_id'),
            ]);
        }

        $round = RoundModel::getRoundWithId($request->input('fordulo_id'));
        $competitor = UserModel::getUser($request->input('f_id'));

        return view('competitor-row', compact('competitor', 'round'))->with('success', 'Competitor added successfully.');
    }


    public function delete(Request $request) {
        $user_id = $request->user_id;
        $round_id = $request->round_id;

        CompetitorModel::where('f_id', $user_id)->where('fordulo_id', $round_id)->delete();

        return response()->json(['success'=>true,'tr'=>'tr_'.$user_id]);
    }

}
