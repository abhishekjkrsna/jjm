<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;

class TeamController extends Controller
{
    public function getTeam(int $id)
    {
        try {
            $team = Teams::find($id);
            if ($team) {
                return ResponseController::sendResponse(true, 'Team found', $team, 200);
            } else {
                return ResponseController::sendResponse(false, 'Team not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addTeam(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'name' => 'required|string|max:50',
                    'pro_id' => 'required|numeric',
                    'description' => 'nullable|string|max:255',
                    'added_by' => 'required|numeric',
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $team = new Teams();
            $team->name = $request->name;
            $team->pro_id = $request->pro_id;
            $team->description = $request->description;
            $team->added_by = $request->added_by;
            $team->save();

            return ResponseController::sendResponse(true, 'Team added successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allTeams()
    {
        try {
            $teams = Teams::all();
            return ResponseController::sendResponse(true, 'All Teams', $teams, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteTeam(int $id)
    {
        try {
            $team = Teams::find($id);
            if ($team) {
                $team->delete();
                return ResponseController::sendResponse(true, 'Team deleted successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Team not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateTeam(int $id, Request $request)
    {
        try {
            $team = Teams::find($id);

            if ($team) {
                try {
                    $validate = $request->validate([
                        'name' => 'required|string|max:50',
                        'pro_id' => 'required|numeric',
                        'description' => 'nullable|string|max:255',
                        'added_by' => 'required|numeric',
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $team->update($validate);

                return ResponseController::sendResponse(true, 'Team updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Team not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
