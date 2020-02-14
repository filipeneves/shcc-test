<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUploadRequest;
use App\Jobs\TransformImageJob;
use Intervention\Image\Facades\Image;

/**
 * Class ImageController
 * @package App\Http\Controllers\Image
 */
class ImageController extends Controller
{

    /**
     * Main endpoint of the test, delegates the actual work to the TransformImageJob job.
     * @endpoint /v1/image/upload
     * @param ImageUploadRequest $request
     */
    public function transform(ImageUploadRequest $request)
    {
        $image = Image::make($request->file('image'));
        $filters = json_decode($request->filters);
        if (!$filters) {
            abort(400);
        }
        // Since this job is not async and the handle method isn't supposed to return anything for async jobs, I'm creating an instance of the TransformImageJob object to get to the handle method.
        $job = new TransformImageJob($image, $filters);
        return $job->handle();
    }

}
