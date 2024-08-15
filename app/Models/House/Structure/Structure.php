<?php

namespace App\Models\House\Structure;

use App\Models\House\Equipment\Equipment;
use App\Models\House\House\House;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model implements TranslatableContract
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
        'name'
    ];

    /**
     * The houses that belong to the structure.
     */
    public function houses()
    {
        return $this->belongsToMany(House::class, 'houses_structures')
                    ->withPivot('price')
                    ->withTimestamps();
    }

    /**
     * The equipments that belong to the structure.
    */

    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }



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
}
