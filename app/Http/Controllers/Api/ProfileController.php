<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\AddProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\Api\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profile::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProfileRequest $request)
    {
        Profile::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Profile created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return response()->json([
            'res'=>true,
            'data'=>$profile
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request,Profile $profile)
    {
        $profile->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Profile updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Profile deleted success'
        ],200);
    }
}
