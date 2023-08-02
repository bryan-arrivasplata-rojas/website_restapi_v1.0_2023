<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\AddImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Models\Api\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Image::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddImageRequest $request)
    {
        $data = $request->all();
        if($data['extension']=='gif'){
            $data['url']=env('APP_URL').'/assets/img/'.$request->name.'.gif';
        }else{
            $data['url']=env('APP_URL').'/assets/img/'.$request->name.'.png';
        }
        //$path = $request->file('image')->storeAs('public/assets/img/'.$request->name.'.png');
        Image::create($data);
        return response()->json([
            'res'=>true,
            'msg'=>'Image created success'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return response()->json([
            'res'=>true,
            'data'=>$image
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request,Image $image)
    {
        $image->update($request->all());
        return response()->json([
            'res'=>true,
            'msg'=>'Rol updated success'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //unlink(storage_path().'\app\public\assets\img/'.$image->name.'.png');
        $image->delete();
        return response()->json([
            'res'=>true,
            'msg'=>'Image deleted success'
        ],200);
    }
}
