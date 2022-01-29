<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;
use Storage;
class ProjectTypeController extends Controller
{
    public function index(){
        $project_types = ProjectType::all();
        return view('admin.project_types.index', compact('project_types'));
    }
    public function create(){
        $this->authorize('view-project_type');
        return view('admin.project_types.create');
    }
    public function store(Request $request){
        $this->authorize('view-project_type');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255',
            'icon'  => 'nullable|image'
        ]);
        $names = $request->name;
        $data = [];
        if($request->hasFile('icon')){
            $data['icon'] = $request->file('icon')->store('types');
        }
        $project_type = ProjectType::create($data);
        foreach(config('translatable.langs') as $key => $lang){
            $project_type->setTranslation('name', $key, trim($names[$key]));
        }
        $project_type->save();
        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.project_types.index');
    }
    public function show(Request $request, ProjectType $project_type){
        return view('project_type', compact('project_type'));
    }
    public function edit(ProjectType $project_type){
        $this->authorize('view-project_type');
        return view('admin.project_types.edit', compact('project_type'));
    }
    public function update(Request $request, ProjectType $project_type){
        $this->authorize('view-project_type');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:255',
            'icon'      => 'nullable|image'
        ]);
        $names = $request->name;
        if(($request->has('del_icon') && $project_type->icon) || $request->hasfile('icon')){
            Storage::delete($project_type->icon);
            $project_type->icon = NULL;
        }
        if($request->hasFile('icon')){
            $project_type->icon = $request->file('icon')->store('types');
        }
        foreach(config('translatable.langs') as $key => $lang){
            $project_type->setTranslation('name', $key, trim($names[$key]));
        }
        $project_type->save();
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(ProjectType $project_type){
        $this->authorize('view-project_type');
        if($project_type->icon) Storage::delete($project_type->icon);
        $project_type->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.project_types.index');
    }
}
