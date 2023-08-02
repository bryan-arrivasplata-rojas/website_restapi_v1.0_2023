<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Host\AddHostRequest;
use App\Http\Requests\Host\UpdateHostRequest;
use App\Models\Api\Host;
use Illuminate\Http\Request;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Host::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddHostRequest $request)
    {
        Host::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Host created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Host $host)
    {
        return response()->json([
            'res'=>true,
            'data'=>$host
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHostRequest $request,Host $host)
    {
        $host->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Host updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Host $host)
    {
        $host->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Host deleted success'
        ],200);
    }
}
