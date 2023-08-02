<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\All;
use Illuminate\Http\Request;

class AllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return All::with('role','userhost.file')->get();
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
    public function show(All $all)
    {
        return All::with('role','userhost.file')->find($all);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
