<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Direction;
use App\Models\Reward;
class HomeController extends Controller
{
    public function index(){
        $project_types = ProjectType::all();
        $projects = Project::all();
        $markers = $projects->map(function($item){
            return [
                'name'      => $item->name,
                'latLng'    => [$item->lat, $item->lon],
                'attribute' => 'image',
                'scale'     => [
                    'closed' => $item->type->icon ?? '/images/object.svg',
                ]
            ];
        });
        $directions = Direction::all();
        $postCategories = PostCategory::with('frontPosts')->get();
        $rewards = Reward::all();

        $news_run = Post::select('name','slug')->where('run_string','1')->get();

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

        return view('home', compact('project_types','projects', 'directions', 'postCategories', 'markers', 'rewards', 'month', 'news_run'));
    }
}
