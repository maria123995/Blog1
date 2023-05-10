<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageHelper
{

    public static function uploadImage(Request $request)
    {
        $path = storage_path('app/public/uploads/' . Carbon::now()->format('Y'));
        // Form::open('your_path', array('files' => true));
        $imageName = Str::random(5) . "." . $request->image->getClientOriginalExtension();
        $request->image->move($path, $imageName);
        return $imageName;
    }
}
