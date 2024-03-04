<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // funziona!
        $projects = Project::with('type', 'technologies')->paginate(8);
        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }
}
