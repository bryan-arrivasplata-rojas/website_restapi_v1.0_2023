<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\AddRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Api\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRoleRequest $request)
    {
        Role::create($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Rol created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return response()->json([
            'res'=>true,
            'data'=>$role
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request,Role $role)
    {
        $role->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Rol updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Rol deleted success'
        ],200);
    }
}
