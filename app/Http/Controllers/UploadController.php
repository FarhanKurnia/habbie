<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {

            $request->validate([
                'upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            $image = $request->file('upload');
            $image_name = time()."_".$image->getClientOriginalName();
            $folder = 'storage/img/media';
            $image->move(public_path($folder), $image_name);
            $url = asset($folder . '/' . $image_name);
            
            return response()->json([
                'fileName' => $image_name, 
                'uploaded' => 1, 
                'url' => $url
            ]);
        }
    }
}
