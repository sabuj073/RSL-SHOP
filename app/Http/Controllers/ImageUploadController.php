<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Upload;
use Cloudder;

class ImageUploadController extends Controller
{
    //
   public function home()
   {
    $images = "";
    return view('home', compact('images'));   }
    public function uploadImages(Request $request)
    {
        $this->validate($request,[
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png,gif|between:1, 6000',
        ]);
        $image = $request->file('image_name');
        $name = $request->file('image_name')->getClientOriginalName();
        $image_name = $request->file('image_name')->getRealPath();;
        \Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId());
    //save to uploads directory
        $image->move(public_path("uploads"), $name);
    //Save images
        dd($image_url);
    
}
}
