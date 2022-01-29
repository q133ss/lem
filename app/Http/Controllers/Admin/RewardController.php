<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reward;
use Illuminate\Support\Str;
use Storage;
class RewardController extends Controller
{
    public function index(Request $request){
        $this->authorize('view-reward');
        $rewards = Reward::latest()->paginate(50);
        return view('admin.rewards.index', compact('rewards'));
    }
    public function create(){
        $this->authorize('view-reward');
        return view('admin.rewards.create');
    }
    public function store(Request $request){
        $this->authorize('view-reward');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image'
        ]);
        $names = $request->name;
        $descriptions = $request->description;
        $reward = Reward::create();
        if($request->hasfile('photo')){
            $reward->photo = '/storage/'.$request->file('photo')->store('rewards', 'public');
        }
        foreach(config('translatable.langs') as $key => $lang){
            $reward->setTranslation('name', $key, trim($names[$key]));
            $reward->setTranslation('description', $key, trim($descriptions[$key]));
        }
        $reward->save();
        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.rewards.index');
    }
    public function show(Request $request, $slug){
        $reward = Reward::where('slug', $slug)->firstOrFail();
        return view('reward', compact('reward'));
    }
    public function edit(Reward $reward){
        $this->authorize('view-reward');
        return view('admin.rewards.edit', compact('reward'));
    }
    public function update(Request $request, Reward $reward){
        $this->authorize('view-reward');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image',
        ]);
        $names = $request->name;
        $descriptions = $request->description;
        if(($request->has('del_photo') && $reward->photo) || $request->hasFile('photo')){
            Storage::delete($reward->photo);
            $reward->photo = NULL;
        }
        if($request->hasFile('photo')){
            $reward->photo = $request->file('photo')->store('rewards');
        }
        foreach(config('translatable.langs') as $key => $lang){
            $reward->setTranslation('name', $key, trim($names[$key]));
            $reward->setTranslation('description', $key, trim($descriptions[$key]));
        }
        $reward->save();
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Reward $reward){
        $this->authorize('view-reward');
        if($reward->photo) Storage::delete($reward->photo);
        $reward->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.rewards.index');
    }
}
