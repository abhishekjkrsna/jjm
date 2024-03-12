<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Utilities\ResponseController;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Vendors;
use Ramsey\Uuid\Type\Integer;

class VendorController extends Controller
{
    public function getVendor(int $id)
    {
        try {
            $vendor = Vendors::find($id);
            if ($vendor) {
                return ResponseController::sendResponse(true, 'Vendor found', $vendor, 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function addVendor(Request $request)
    {
        try {
            try {
                $validate = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'mobile' => ['required', 'string', 'max:10'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'state' => ['required', 'string'],
                    'district' => ['required', 'string'],
                    'address' => ['required', 'string', 'max:255'],
                    'remark' => ['nullable', 'string', 'max:255'],
                    'added_by' => ['required', 'integer'],
                ]);
            } catch (\Exception  $e) {
                return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
            }

            $vendor = new Vendors();
            $vendor->name = $request->name;
            $vendor->mobile = $request->mobile;
            $vendor->email = $request->email;
            $vendor->state = $request->state;
            $vendor->district = $request->district;
            $vendor->address = $request->address;
            $vendor->remark = $request->remark;
            $vendor->added_by = $request->added_by;
            $vendor->save();

            return ResponseController::sendResponse(true, 'Vendor added successfully', [], 200);
        } catch (\Exception $e) {
            //throw $th;
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function allVendors()
    {
        try {
            $vendors = Vendors::all();
            return ResponseController::sendResponse(true, 'All Vendors', $vendors, 200);
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function deleteVendor(int $id)
    {
        try {
            $vendor = Vendors::find($id);
            if ($vendor) {
                $vendor->delete();
                return ResponseController::sendResponse(true, 'Vendor updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }

    public function updateVendor(int $id, Request $request)
    {
        try {
            $vendor = Vendors::find($id);
            if ($vendor) {
                try {
                    $validate = $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'mobile' => ['required', 'string', 'max:10'],
                        'email' => ['required', 'string', 'email', 'max:255'],
                        'state' => ['required', 'string'],
                        'district' => ['required', 'string'],
                        'remark' => ['nullable', 'string', 'max:255'],

                    ]);
                } catch (\Exception  $e) {
                    return ResponseController::sendResponse(false, 'Validation failed: ' . $e->getMessage(), [], 400);
                }
                $vendor->update($validate);

                return ResponseController::sendResponse(true, 'Vendor updated successfully', [], 200);
            } else {
                return ResponseController::sendResponse(false, 'Vendor not found', [], 404);
            }
        } catch (\Exception $e) {
            return ResponseController::sendResponse(false, 'Something went wrong: ' . $e->getMessage(), [], 500);
        }
    }
}
