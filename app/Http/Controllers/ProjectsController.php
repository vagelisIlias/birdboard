<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function store()
    {   
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'owner_id' => 'required',
        ]);
        
        Project::create($attributes);

        return redirect('/projects')->withErrors([
            'title' => 'A title required for the title of project',
            'description' => 'A description required for the description of project',
            'owner_id' => 'An owner id required for the owner',
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
