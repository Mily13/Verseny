<?php

namespace App\Http\Controllers;

use App\Models\RoundModel;
use App\Models\CompetitionModel;
use Illuminate\Http\Request;

class CompetitionController extends Controller{
    public function insert(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'year' => 'required',
            'country' => 'required|max:99',
            'sport' => 'required|max:99',
        ]);

        $name =  $request->input('name');
        $year = $request->input('year');
        $existing = CompetitionModel::isCompetitionExisting($name, $year);

        if (!$existing){
            $competition = CompetitionModel::create([
                'name' => $request->input('name'),
                'year' => $request->input('year'),
                'description' => $request->input('description'),
                'country' => $request->input('country'),
                'sport' => $request->input('sport'),
            ]);
        }

        return view('competition-row', compact('competition'))->with('success', 'Competition added successfully.');
    }

    public function getCompetitions(){
        $competitions = CompetitionModel::all();
        return view('home', compact('competitions'));
    }

    public function getCompetition($v_id){
        $competition = CompetitionModel::find($v_id);
        $rounds = RoundModel::getRounds($v_id);

        if (!$competition || !$rounds) {
            return redirect()->back()->with('error', 'Can not be found!');
        }

        return view('competition', compact('competition', 'rounds'));
    }
}
