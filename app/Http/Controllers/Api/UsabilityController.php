<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usability\AddUsabilityRequest;
use App\Http\Requests\Usability\UpdateUsabilityRequest;
use App\Models\Api\Usability;
use Illuminate\Http\Request;

class UsabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usability::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUsabilityRequest $request)
    {
        Usability::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Usability created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usability $usability)
    {
        return response()->json([
            'res'=>true,
            'data'=>$usability
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsabilityRequest $request,Usability $usability)
    {
        $usability->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Usability updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usability $usability)
    {
        $usability->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Usability deleted success'
        ],200);
    }
}
