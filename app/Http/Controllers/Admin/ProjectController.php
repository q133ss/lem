<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Region;
use App\Models\ProjectType;
use Illuminate\Support\Str;
use Storage;
use App\Models\File;
class ProjectController extends Controller
{
    public function index(Request $request){
        $this->authorize('view-project');
        $projects = Project::latest()->paginate(50);
        return view('admin.projects.index', compact('projects'));
    }
    public function create(){
        $this->authorize('view-project');
        $regions = Region::all();
        $types = ProjectType::all();
        return view('admin.projects.create', compact('types', 'regions'));
    }
    public function store(Request $request){
        $this->authorize('view-project');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image'
        ]);
        $names = $request->name;
        $previews = $request->preview_text;
        $details = $request->detail_text;
        $owners = $request->owner;
        $data = $request->only(['region_id', 'project_type_id', 'lat', 'lon']);
        $data['slug'] = Str::slug($names[$default], '-');
        $data['active'] = $request->has('active');
        if($request->hasfile('photo')){
            $data['photo'] = '/storage/'.$request->file('photo')->store('projects', 'public');
        }
        $project = Project::create($data);
        foreach(config('translatable.langs') as $key => $lang){
            $project->setTranslation('name', $key, trim($names[$key]));
            $project->setTranslation('preview_text', $key, trim($previews[$key]));
            $project->setTranslation('detail_text', $key, trim($details[$key]));
            $project->setTranslation('owner', $key, trim($owners[$key]));
        }
        $project->save();
        //Gallery
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $photo){
                $file = new File();
                $file->src = '/storage/'.$photo->store('projects', 'public');
                $file->name = $photo->getClientOriginalName();
                $file->category = 'Gallery';
                $file->filable_type = 'App\Models\Project';
                $file->filable_id = $project->id;
                $file->save();
            }
        }
        //Video
        if($request->hasFile('video')){
            foreach($request->file('video') as $photo){
                $file = new File();
                $file->src = '/storage/'.$photo->store('projects', 'public');
                $file->name = $photo->getClientOriginalName();
                $file->category = 'Video';
                $file->filable_type = 'App\Models\Project';
                $file->filable_id = $project->id;
                $file->save();
            }
        }

        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.projects.index');
    }
    public function show(Request $request, $slug){
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('project', compact('project'));
    }
    public function edit(Project $project){
        $this->authorize('view-project');
        $regions = Region::all();
        $types = ProjectType::all();
        return view('admin.projects.edit', compact('project', 'types', 'regions'));
    }
    public function update(Request $request, Project $project){
        $this->authorize('view-project');
        $default = config('translatable.fallback_locale');
        $request->validate([
            "name.$default" => 'required',
            "name.*"    => 'nullable|string|max:70',
            'photo' => 'nullable|image',
        ]);
        $names = $request->name;
        $previews = $request->preview_text;
        $details = $request->detail_text;
        $owners = $request->owner;
        $data = $request->only(['region_id', 'project_type_id', 'lat', 'lon']);
        $data['slug'] = Str::slug($names[$default], '-');
        $data['active'] = $request->has('active');
        if(($request->has('del_photo') && $project->photo) || $request->hasFile('photo')){
            Storage::delete($project->photo);
            $data['photo'] = NULL;
        }
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('projects');
        }
        $project->update($data);
        foreach(config('translatable.langs') as $key => $lang){
            $project->setTranslation('name', $key, trim($names[$key]));
            $project->setTranslation('preview_text', $key, trim($previews[$key]));
            $project->setTranslation('detail_text', $key, trim($details[$key]));
            $project->setTranslation('owner', $key, trim($owners[$key]));
        }
        $project->save();

        //Gallery
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $photo){
                $file = new File();
                $file->src = '/storage/'.$photo->store('projects', 'public');
                $file->name = $photo->getClientOriginalName();
                $file->category = 'Gallery';
                $file->filable_type = 'App\Models\Project';
                $file->filable_id = $project->id;
                $file->save();
            }
        }
        //Video
        if($request->hasFile('video')){
            foreach($request->file('video') as $photo){
                $file = new File();
                $file->src = '/storage/'.$photo->store('projects', 'public');
                $file->name = $photo->getClientOriginalName();
                $file->category = 'Video';
                $file->filable_type = 'App\Models\Project';
                $file->filable_id = $project->id;
                $file->save();
            }
        }
        
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Project $project){
        $this->authorize('view-project');
        if($project->photo) Storage::delete($project->photo);
        $project->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.projects.index');
    }
}
