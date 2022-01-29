<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;
use Illuminate\Support\Str;
use Cache;
class PostCategoryController extends Controller
{
    public function index(){
        $this->authorize('view-post');
        $categories = PostCategory::latest()->paginate(50);
        return view('admin.categories.index', compact('categories'));
    }
    public function create(){
        $this->authorize('view-post');
        return view('admin.categories.create');
    }
    public function show($slug){
        $category = PostCategory::whereActive(1)->where('slug', $slug)->firstOrFail();
        $posts = $category->activePosts()->paginate(50);
        return view('category', compact('category', 'posts'));
    }
    public function store(Request $request){
        $this->authorize('view-post');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*" => 'nullable|string|max:255'
        ]);
        $names = $request->name;
        $data['slug'] = Str::slug($names[$default], '-');
        $category = PostCategory::create($data);
        foreach(config('translatable.langs') as $key => $lang){
            $category->setTranslation('name', $key, $names[$key]);
        }
        $category->save();
        session()->flash('success', 'Новая категория успешно добавлена');
        return redirect()->route('admin.categories.index');
    }
    public function edit(PostCategory $category){
        $this->authorize('view-post');
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, PostCategory $category){
        $this->authorize('view-post');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255'
        ]);
        $names = $request->name;
        $category->slug = Str::slug($names[$default], '-');
        foreach(config('translatable.langs') as $key => $lang){
            $category->setTranslation('name', $key, $names[$key]);
        }
        $category->save();
        session()->flash('success', 'Категория успешно изменена');
        return redirect()->route('admin.categories.index');
    }
    public function destroy(PostCategory $category){
        $this->authorize('view-post');
        $category->delete();
        session()->flash('success', 'Рубрика успешно удалена');
        return redirect()->route('admin.categories.index');
    }
}
