<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function index(Request $request){
        $projects = Project::latest()->paginate();
        return view('projects.index', compact('projects'));
    }
    public function show($lang, Project $project){
        $objects = Project::where('id', '!=', $project->id)->latest()->limit(5)->get();
        return view('projects.show', compact('project', 'objects'));
    }
}
