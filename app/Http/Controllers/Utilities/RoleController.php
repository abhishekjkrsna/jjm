<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Roles;
use Ramsey\Uuid\Type\Integer;

class RoleController extends Controller
{
    public function getRole(int $id)
    {
        try {
            $role = Roles::find($id);
            if ($role) {
                return ResponseController::sendResponse(true, 'Role found', $role, 200);
            } else {
                return ResponseController::sendResponse(false, 'Role not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addRole(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'name' => 'required|string|max:50',
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $role = new Roles();
            $role->name = $request->name;
            $role->save();

            return ResponseController::sendResponse(true, 'Role added successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allRoles()
    {
        try {
            $projects = Roles::all();
            return ResponseController::sendResponse(true, 'All projects', $projects, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteRole(int $id)
    {
        try {
            $role = Roles::find($id);
            if ($role) {
                $role->delete();
                return ResponseController::sendResponse(true, 'Role deleted successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Role not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateRole(int $id, Request $request)
    {
        try {
            $role = Roles::find($id);
            if ($role) {
                try {
                    $validate = $request->validate([
                        'name' => 'required|string|max:50',
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $role->update($validate);

                return ResponseController::sendResponse(true, 'Role updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Role not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
