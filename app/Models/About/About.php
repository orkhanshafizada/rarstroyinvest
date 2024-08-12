<?php

namespace App\Models\About;

use App\Models\File;
use App\Models\Image;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    /**
     * @var array
     */
    protected $guarded = [];


    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'short_description',
        'long_description',
        'slug'
    ];

    /**
     * Get the images for the model, optionally filtered by type.
     *
     * @param string $image_type
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image($image_type = 'default')
    {
        return $this->morphMany(Image::class, 'imageable')
                    ->where('type', $image_type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function file()
    {
        return $this->morphMany(File::class,'fileable');
    }
}
