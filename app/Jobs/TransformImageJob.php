<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Intervention\Image\Image;


class TransformImageJob
{

    use Dispatchable, Queueable;

    private const ALLOWED_FILTERS = [
        'invert',
        'greyscale',
        'blur',
        'pixelate',
        'colorize',
        'brightness',
        'canvas',
        'circle',
        'contrast',
        'fill',
        'flip',
        'fit',
        'gamma',
        'opacity',
        'orientate',
        'resize',
        'trim',
        'widen',
        'width'
    ];

    public $timeout = 1;

    /**
     * Image file to be transformed
     * @var Image
     */
    private $image;

    /**
     * Array of filters to apply to the file
     * @var array
     */
    private $filters;

    /**
     * TransformImageJob constructor.
     * @param Image $image
     * @param array $filters
     */
    public function __construct(Image $image, array $filters)
    {
        $this->image = $image;
        $this->filters = $filters;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->filters as $filter) {
            if (in_array($filter->effect, self::ALLOWED_FILTERS)) {
                call_user_func_array([$this->image, $filter->effect], $filter->values);
            }
        }
        return $this->image->response();
    }

}
