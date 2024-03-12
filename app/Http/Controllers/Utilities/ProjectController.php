<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Projects;
use Ramsey\Uuid\Type\Integer;

class ProjectController extends Controller
{
    public function getProject(int $id)
    {
        try {
            $project = Projects::find($id);
            if ($project) {
                return ResponseController::sendResponse(true, 'Project found', $project, 200);
            } else {
                return ResponseController::sendResponse(false, 'Project not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addProject(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'name' => 'required|string|max:50',
                    'description' => 'required|string|max:255',
                    'vertical' => 'required|numeric',
                    'spoc_id' => 'required|numeric',
                    'added_by' => 'required|numeric',
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $project = new Projects();
            $project->name = $request->name;
            $project->description = $request->description;
            $project->vertical = $request->vertical;
            $project->spoc_id = $request->spoc_id;
            $project->added_by = $request->added_by;
            $project->save();

            return ResponseController::sendResponse(true, 'Project added successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allProjects()
    {
        try {
            $projects = Projects::all();
            return ResponseController::sendResponse(true, 'All Projects', $projects, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteProject(int $id)
    {
        try {
            $project = Projects::find($id);
            if ($project) {
                $project->delete();
                return ResponseController::sendResponse(true, 'Project deleted successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Project not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateProject(int $id, Request $request)
    {
        try {
            $project = Projects::find($id);
            if ($project) {
                try {
                    $validate = $request->validate([
                        'name' => 'required|string|max:50',
                        'description' => 'required|string|max:255',
                        'vertical' => 'required|numeric',
                        'spoc_id' => 'required|numeric',
                        'added_by' => 'required|numeric',
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $project->update($validate);

                return ResponseController::sendResponse(true, 'Project updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Project not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
