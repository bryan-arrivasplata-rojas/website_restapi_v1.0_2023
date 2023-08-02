<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\AddFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Models\Api\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return File::with('usability','userhost.host','userhost.user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddFileRequest $request)
    {
        File::create([
            'url' => $request['url'],
            'name' => $request['name'],
            'description' => $request['description'],
            'position' => $request['position'],
            'urlOptional' => $request['urlOptional'],
            'idUserHost' => $request['idUserHost'],
            'idUsability' => $request['idUsability']
        ]);
        return response()->json([
            'res'=>true,
            'msg'=>'File created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return response()->json([
            'res'=>true,
            'data'=>$file
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request,File $file)
    {
        $file->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'File updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'File deleted success'
        ],200);
    }
}
