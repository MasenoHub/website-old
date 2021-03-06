<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use OpenGraph;
use shweshi\OpenGraph\Exceptions\FetchException;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::with(['lead'])->get()
        ]);
    }

    public function show($project)
    {
        $project = Project::with(['lead'])->find($project);

        try {
            $project->open_graph = OpenGraph::fetch($project->url);
        } catch (FetchException) {
        }

        return view('projects.show', [
            'project' => $project
        ]);
    }
}
