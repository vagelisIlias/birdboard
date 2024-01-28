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
        ]);
        
        Project::create($attributes);

        return redirect('/projects')->withErrors([
            'title' => 'The title is required', 
            'description' => 'The description is required',
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
