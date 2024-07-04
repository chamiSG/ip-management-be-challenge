<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\AuditResource;
use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Audit::all();
        return $this->sendResponse(AuditResource::collection($logs), 'Logs retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Audit $audit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audit $audit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit)
    {
        //
    }
}
