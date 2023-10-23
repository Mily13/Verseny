<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\RoundModel;
use App\Models\CompetitionModel;
use App\Models\CompetitorModel;
use Illuminate\Http\Request;

class RoundController extends Controller{
    public function insert(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'date' => 'required',
        ]);

        $round = RoundModel::create([
            'v_id' => $request->input('v_id'),
            'name' => $request->input('name'),
            'date' => $request->input('date'),
        ]);

        return view('round-row', compact('round'))->with('success', 'Round added successfully.');
    }

    public function getRound($fordulo_id){
        $round = RoundModel::find($fordulo_id);
        $competitors_ids = CompetitorModel::getCompetitorFids($fordulo_id);
        $competitors = UserModel::getUsers($competitors_ids);
        $competition = CompetitionModel::getCompetitionName($round->v_id);
        $users = UserModel::getAcsessableUsers($competitors_ids);

        if (!$round || !$competitors) {
            return redirect()->back()->with('error', 'Can not be found!');
        }

        return view('round', compact('round', 'competitors', 'competition', 'users'));
    }
}
