<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {   
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        auth()->user()->projects()->create($attributes);
        
        return redirect('/projects')->withErrors([
            'title' => 'A title required for the title of project',
            'description' => 'A description required for the description of project',
        ]);
    }


    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
