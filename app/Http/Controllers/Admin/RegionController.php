<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
class RegionController extends Controller
{
    public function index(){
        $regions = Region::all();
        return view('admin.regions.index', compact('regions'));
    }
    public function create(){
        $this->authorize('view-region');
        return view('admin.regions.create');
    }
    public function store(Request $request){
        $this->authorize('view-region');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255'
        ]);
        $names = $request->name;
        $region = Region::create($data);
        foreach(config('translatable.langs') as $key => $lang){
            $region->setTranslation('name', $key, trim($names[$key]));
        }
        $region->save();
        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.regions.index');
    }
    public function show(Request $request, Region $region){
        return view('region', compact('region'));
    }
    public function edit(Region $region){
        $this->authorize('view-region');
        return view('admin.regions.edit', compact('region'));
    }
    public function update(Request $request, Region $region){
        $this->authorize('view-region');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255'
        ]);
        $names = $request->name;
        foreach(config('translatable.langs') as $key => $lang){
            $region->setTranslation('name', $key, trim($names[$key]));
        }
        $region->save();
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Region $region){
        $this->authorize('view-region');
        $region->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.regions.index');
    }
    public function delmany(Request $request){
        $this->authorize('view-region');
        session()->flash('success', 'Выбранные записи успешно удалены');
        if($request->ids){
            Region::whereIn('id', $request->ids)->delete();
        }
        return redirect()->route('admin.regions.index');
    }
}
