<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserHost\AddUserHostRequest;
use App\Http\Requests\UserHost\UpdateUserHostRequest;
use App\Models\Api\UserHost;
use Illuminate\Http\Request;

class UserHostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserHost::with('user','host')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserHostRequest $request)
    {
        UserHost::create([
            'idHost' => $request['idHost'],
            'id' => $request['id']
        ]);
        return response()->json([
            'res'=>true,
            'msg'=>'UserHost created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserHost $userhost)
    {
        return response()->json([
            'res'=>true,
            'data'=>$userhost
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserHostRequest $request,UserHost $userhost)
    {
        $userhost->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'UserHost updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserHost $userhost)
    {
        $userhost->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'UserHost deleted success'
        ],200);
    }
}
