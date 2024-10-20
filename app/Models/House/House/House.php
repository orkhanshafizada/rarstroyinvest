<?php

namespace App\Models\House\House;

use App\Models\House\Equipment\Equipment;
use App\Models\House\Filter\Filter;
use App\Models\House\Structure\Structure;
use App\Models\Image;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model implements TranslatableContract
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
        'name',
        'video_url'
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
     * The structures that belong to the house.
     */
    public function structures()
    {
        return $this->belongsToMany(Structure::class, 'houses_structures')
                    ->withPivot('price')
                    ->with('equipment')
                    ->withTimestamps();
    }
    /**
     * The filters that belong to the house.
     */
    public function filters()
    {
        return $this->belongsToMany(Filter::class, 'houses_filters')
                    ->withPivot('value')
                    ->withTimestamps();
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    /**
     * The equipments that belong to the house.

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
*/


    /**
     * Scope a query to only include active sliders.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    /**
     * Scope a query to only include houses with type 'catalogue'.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCatalogue($query)
    {
        return $query->where('type', 'catalogue');
    }

    /**
     * Scope a query to only include houses with type 'catalogue'.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePortfolio($query)
    {
        return $query->where('type', 'portfolio');
    }
}
