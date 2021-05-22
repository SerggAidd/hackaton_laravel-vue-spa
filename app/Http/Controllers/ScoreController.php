<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ScoreController extends Controller
{
    public function get(Request $request)
    {
        return Score::get();
    }
    public function create(Request $request)
    {
        $score = new Score();
        $score->user_id = $request->user_id;
        $score->code = $request->code;
        $score->design = $request->design;
        $score->gameplay = $request->gameplay;
        $score->tour = $request->tour;
        $score = $score->save();
        return $score;
    }
    public function edit(Request $request)
    {
        return 'hello world';
    }
    public function delete(Request $request)
    {
        $res=Scores::where('id',$request->id)->delete();
        return $res;
    }
}