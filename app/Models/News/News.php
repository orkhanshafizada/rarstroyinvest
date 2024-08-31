<?php

namespace App\Models\News;

use App\Models\File;
use App\Models\Image;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model implements TranslatableContract
{
    use HasFactory, Translatable, SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'slug',
        'short_content',
        'long_content',
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

    /**
     * Get the URL of the image attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        return 'storage/' . $value;
    }
}
