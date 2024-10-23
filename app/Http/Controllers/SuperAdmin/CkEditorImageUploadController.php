<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkEditorImageUploadController extends Controller
{
    public function storeImage(Request $request)
    {
        // if ($request->hasFile('upload')) {
        //     $originName = $request->file('upload')->getClientOriginalName();
        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $request->file('upload')->getClientOriginalExtension();
        //     $fileName = $fileName . '_' . time() . '.' . $extension;

        //     $request->file('upload')->move(public_path('media'), $fileName);

        //     $url = asset('media/' . $fileName);
        //     return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        // }

        if ($request->hasFile('upload')) {
            $image    = $request->file('upload');
            $name     = 'ck-file-' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('ck/file');
            $image->move($location, $name);
            $url = asset('ck/file/' . $name);
            return response()->json(['fileName' => $name, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
