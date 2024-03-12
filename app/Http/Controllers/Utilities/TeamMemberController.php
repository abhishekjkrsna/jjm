<?php

namespace App\Http\Controllers\Utilities;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Members;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;


class TeamMemberController extends Controller
{
    public function getTm(int $id)
    {
        try {
            $tm = Members::find($id);
            if ($tm) {
                return ResponseController::sendResponse(true, 'Team Member found', $tm, 200);
            } else {
                return ResponseController::sendResponse(false, 'Team Member not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addTm(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    't_id' => ['required', 'integer'],
                    'u_id' => ['required', 'integer'],
                    'role' => ['required', 'integer'],
                    'remark' => ['nullable', 'string', 'max:255'],
                    'added_by' => ['required', 'integer']
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $tm = new Members();
            $tm->t_id = $validate['t_id'];
            $tm->u_id = $validate['u_id'];
            $tm->role = $validate['role'];
            $tm->remark = $validate['remark'];
            $tm->added_by = $validate['added_by'];
            $tm->save();

            return ResponseController::sendResponse(true, 'Team Member associated successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allTm()
    {
        try {
            $tm = Members::all();
            return ResponseController::sendResponse(true, 'All Team Members', $tm, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteTm(int $id)
    {
        try {
            $tm = Members::find($id);
            if ($tm) {
                $tm->delete();
                return ResponseController::sendResponse(true, 'Team Member deleted successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor association not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateTm(int $id, Request $request)
    {
        try {
            $tm = Members::find($id);
            if ($tm) {
                try {
                    $validate = $request->validate([
                        't_id' => ['required', 'integer'],
                        'u_id' => ['required', 'integer'],
                        'role' => ['required', 'integer'],
                        'remark' => ['nullable', 'string', 'max:255'],
                        'added_by' => ['required', 'integer']
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $tm->update($validate);

                return ResponseController::sendResponse(true, 'Vendor association updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor association  not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function getProjectTeam(int $id)
    {
        try {
            $tm = DB::table('teams')->where('pro_id', $id)->get();
            if ($tm) {
                return ResponseController::sendResponse(true, 'Project Team Members', $tm, 200);
            } else {
                return ResponseController::sendResponse(false, 'Project Team Members not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
