<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUpload;
use Auth;
use App\User;


class ImageController extends Controller
{
    //
    public function store(Request $request)
    {

       if($request->get('image'))
       {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('images/').$name);
        }

       //$image= new FileUpload();
       $check = Auth::id();
       $admin = User::find($check);
       $currentImage = $admin->photo;
       $admin->photo = $name;
       $admin->save();

       if($currentImage != "profile.png" )
       {
         $havetodelete = public_path('images/').$currentImage;
         @unlink($havetodelete);
       }

       return response()->json(['success' => 'You have successfully uploaded an image'], 200);
     }
}
