<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\PostCategory;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Str;
use Storage;
class PostController extends Controller
{
    public $fillable = [];
    public function __construct(){
        $this->fillable = [
            'slug',
            'post_category_id',
        ];
    }
    public function index(Request $request){
        $this->authorize('view-post');
        $posts = Post::with('post_category')->latest();
        $category = $request->category;
        if($category) $posts->where('post_category_id', $category);
        $posts = $posts->paginate(50);
        $categories = PostCategory::all();
        return view('admin.posts.index', compact('posts', 'category', 'categories'));
    }
    public function create(){
        $this->authorize('view-post');
        $categories = PostCategory::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories', 'users'));
    }
    public function store(Request $request){
        $this->authorize('view-post');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image'
        ]);
        $data = $request->only($this->fillable);
        $names = $request->name;
        $previews = $request->preview_text;
        $details = $request->detail_text;
        $data['slug'] = Str::slug($names[$default], '-');
        $data['active'] = $request->has('active');
        if($request->hasfile('photo')){
            $data['photo'] = '/storage/'.$request->file('photo')->store('posts', 'public');
        }
        $post = Post::create($data);
        foreach(config('translatable.langs') as $key => $lang){
            $post->setTranslation('name', $key, trim($names[$key]));
            $post->setTranslation('preview_text', $key, trim($previews[$key]));
            $post->setTranslation('detail_text', $key, trim($details[$key]));
        }
        if(isset($request->run_str)){
            $post->run_string = 1;
        }
        $post->save();
        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.posts.index');
    }
    public function show(Request $request, $category, $slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post', compact('post'));
    }
    public function edit(Post $post){
        $this->authorize('view-post');
        $categories = PostCategory::all();
        $users = User::all();
        $post->with(['category']);
        return view('admin.posts.edit', compact('categories', 'post', 'users'));
    }
    public function update(Request $request, Post $post){
        $this->authorize('view-post');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image',
        ]);
        $data = $request->only($this->fillable);
        $names = $request->name;
        $previews = $request->preview_text;
        $details = $request->detail_text;
        $data['slug'] = Str::slug($names[$default], '-');
        $data['active'] = $request->has('active');
        if(($request->has('del_photo') && $post->photo) || $request->hasFile('photo')){
            Storage::delete($post->photo);
            $data['photo'] = NULL;
        }
        if($request->hasFile('photo')){
            $data['photo'] = '/storage/'.$request->file('photo')->store('posts', 'public');
        }
        $post->update($data);
        foreach(config('translatable.langs') as $key => $lang){
            $post->setTranslation('name', $key, trim($names[$key]));
            $post->setTranslation('preview_text', $key, trim($previews[$key]));
            $post->setTranslation('detail_text', $key, trim($details[$key]));
        }
        if(isset($request->run_str)){
            $post->run_string = 1;
        }else{
            $post->run_string = 0;
        }
        $post->save();
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Post $post){
        $this->authorize('view-post');
        if($post->photo) Storage::delete($post->photo);
        $post->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.posts.index');
    }
}
