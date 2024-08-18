<?php

namespace App\Models\Staff;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model implements TranslatableContract
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
        'full_name',
        'position',
        'description',
    ];


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
