<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Verticals;

class VerticalController extends Controller
{
    public function getVertical(int $id)
    {
        try {
            $vertical = Verticals::find($id);
            if ($vertical) {
                return ResponseController::sendResponse(true, 'Vertical found', $vertical, 200);
            } else {
                return ResponseController::sendResponse(false, 'Vertical not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addVertical(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'name' => 'required|string|max:50',
                    'description' => 'nullable|string|max:255',
                    'head_id' => 'nullable|numeric',
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $vertical = new Verticals();
            $vertical->name = $request->name;
            $vertical->description = $request->description;
            $vertical->head_id = $request->head_id;
            $vertical->save();

            return ResponseController::sendResponse(true, 'Vertical added successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allVerticals()
    {
        try {
            $verticals = Verticals::all();
            return ResponseController::sendResponse(true, 'All Verticals', $verticals, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteVertical(int $id)
    {
        try {
            $vertical = Verticals::find($id);
            if ($vertical) {
                $vertical->delete();
                return ResponseController::sendResponse(true, 'Vertical deleted successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vertical not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateVertical(int $id, Request $request)
    {
        try {
            $vertical = Verticals::find($id);

            if ($vertical) {
                try {
                    $validate = $request->validate([
                        'name' => 'required|string|max:50',
                        'description' => 'nullable|string|max:255',
                        'head_id' => 'nullable|numeric',
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $vertical->update($validate);

                return ResponseController::sendResponse(true, 'Vertical updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vertical not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
