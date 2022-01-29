<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
class PostController extends Controller
{
    public function index(Request $request){
        $posts = Post::latest()->paginate();
        $postCategory = PostCategory::get();

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

        return view('posts.index', compact('posts', 'postCategory', 'month'));
    }
    public function category(PostCategory $postCategory){
        $posts = $postCategory->posts()->paginate();
        return view('posts.index', compact('posts', 'postCategory'));
    }
    public function show($lang, $slug){

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

        $post = Post::whereSlug($slug)->firstOrFail();
        return view('posts.show', compact('post', 'month'));
    }
}
