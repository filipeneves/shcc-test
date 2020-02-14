<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{

    private const ALLOWED_FILTERS = [
        'invert',
        'greyscale',
    ];

    public function transform(Request $request)
    {
        $file = $request->file('image');
        $image = Image::make($file);
        if (isset($request->filters)) {
            foreach ($request->filters as $filter) {
                if (in_array($filter, self::ALLOWED_FILTERS)) {
                    $image->$filter();
                }
            }
        }
        return $image->response();
    }

}
