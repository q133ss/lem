<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Direction;
use App\Models\Project;
use App\Models\Reward;

class AboutController extends Controller
{
    public function index(){
        $directions = Direction::get();
        $projects = Project::limit(3)->get();
        $rewards = Reward::get();
        $postCategories = PostCategory::with('frontPosts')->get();

        //Месяц публикации
        $month = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря'
        ];

        return view('about', compact('directions', 'projects', 'rewards', 'postCategories', 'month'));
    }
}
