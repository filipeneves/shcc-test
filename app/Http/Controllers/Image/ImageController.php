<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function transform(Request $request)
    {
        return response()->json(['reply' => 'testing endpoints']);
    }

}
