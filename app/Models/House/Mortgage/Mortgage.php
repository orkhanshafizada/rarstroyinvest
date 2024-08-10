<?php

namespace App\Models\House\Mortgage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

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


