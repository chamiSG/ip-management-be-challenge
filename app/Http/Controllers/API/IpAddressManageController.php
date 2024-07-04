<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\IpAddressManageResource;
use App\Models\IpAddressManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IpAddressManageController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ipAddress = IpAddressManage::all();
        return $this->sendResponse(IpAddressManageResource::collection($ipAddress), 'IP Address retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'ip' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $ipAddr = IpAddressManage::create($input);
   
        return $this->sendResponse(new IpAddressManageResource($ipAddr), 'IP Address created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IpAddressManage $ipAddressManage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IpAddressManage $ipAddressManage)
    {
        $input = $request->all();
        $ipAddressManage->label = $input['label'];
        $ipAddressManage->comment = $input['comment'];
        $ipAddressManage->save();
   
        return $this->sendResponse(new IpAddressManageResource($ipAddressManage), 'IP Address updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IpAddressManage $ipAddressManage)
    {
        //
    }
}
