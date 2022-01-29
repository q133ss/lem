<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;
class RewardController extends Controller
{
    public function index(){
        $rewards = Reward::all();
        return $rewards;
    }
}
