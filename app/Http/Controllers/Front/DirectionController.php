<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;
class DirectionController extends Controller
{
    public function index(Request $request){
        $directions = Direction::orderBy('id','ASC')->paginate();
        return view('directions.index', compact('directions'));
    }
    public function show($lang, Direction $direction){
        return view('directions.show', compact('direction'));
    }
}
