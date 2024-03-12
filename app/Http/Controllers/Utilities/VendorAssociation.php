<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Vassociations;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Hash;


class VendorAssociation extends Controller
{
    public function getVaso(int $id)
    {
        try {
            $user = Vassociations::find($id);
            if ($user) {
                return ResponseController::sendResponse(true, 'User found', $user, 200);
            } else {
                return ResponseController::sendResponse(false, 'User not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addVaso(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'p_id' => ['required', 'integer'],
                    'v_id' => ['required', 'integer'],
                    'state' => ['required', 'string', 'max:50'],
                    'district' => ['required', 'string', 'max:50'],
                    'added_by' => ['required', 'integer'],
                    'remark' => ['nullable', 'string', 'max:255'],
                    'start_date' => ['required', 'date'],
                    'end_date' => ['nullable', 'date'],
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $vaso = new Vassociations();
            $vaso->p_id = $request->p_id;
            $vaso->v_id = $request->v_id;
            $vaso->state = $request->state;
            $vaso->district = $request->district;
            $vaso->added_by = $request->added_by;
            $vaso->remark = $request->remark;
            $vaso->start_date = $request->start_date;
            $vaso->end_date = $request->end_date;
            $vaso->save();

            return ResponseController::sendResponse(true, 'Vendor associated successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allVaso()
    {
        try {
            $vaso = Vassociations::all();
            return ResponseController::sendResponse(true, 'All vendor associations', $vaso, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteVaso(int $id)
    {
        try {
            $vaso = Vassociations::find($id);
            if ($vaso) {
                $vaso->delete();
                return ResponseController::sendResponse(true, 'Vendor association deleted successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor association not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateVaso(int $id, Request $request)
    {
        try {
            $vaso = Vassociations::find($id);
            if ($vaso) {
                try {
                    $validate = $request->validate([
                        'p_id' => ['required', 'integer'],
                        'v_id' => ['required', 'integer'],
                        'state' => ['required', 'string', 'max:50'],
                        'district' => ['required', 'string', 'max:50'],
                        'added_by' => ['required', 'integer'],
                        'remark' => ['nullable', 'string', 'max:255'],
                        'start_date' => ['required', 'date'],
                        'end_date' => ['nullable', 'date'],
                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $vaso->update($validate);

                return ResponseController::sendResponse(true, 'Vendor association updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor association  not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
