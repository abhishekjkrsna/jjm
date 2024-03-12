<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function getUser(int $id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                return ResponseController::sendResponse(true, 'User found', $user, 200);
            } else {
                return ResponseController::sendResponse(false, 'User not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addUser(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                    'role' => ['required', 'integer'],
                    'mobile' => ['required', 'string', 'max:10'],
                    'vertical' => ['required', 'integer'],
                    'added_by' => ['required', 'integer'],
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->mobile = $request->mobile;
            $user->vertical = $request->vertical;
            $user->added_by = $request->added_by;
            $user->save();

            return ResponseController::sendResponse(true, 'User added successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allUsers()
    {
        try {
            $users = User::all();
            return ResponseController::sendResponse(true, 'All users', $users, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteProject(int $id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return ResponseController::sendResponse(true, 'User updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'User not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateProject(int $id, Request $request)
    {
        try {
            $user = User::find($id);
            if ($user) {
                try {
                    $validate = $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => ['required', 'string', 'min:8'],
                        'role' => ['required', 'integer'],
                        'mobile' => ['required', 'string', 'max:10'],
                        'vertical' => ['required', 'integer'],
                        'added_by' => ['required', 'integer'],
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $user->update($validate);

                return ResponseController::sendResponse(true, 'User updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'User not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
