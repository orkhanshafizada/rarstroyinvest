<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [];

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


