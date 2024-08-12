<?php

namespace App\Models\House\House;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HouseFilter extends Pivot
{
    use HasFactory;

    protected $table = 'houses_filters';

    protected $guarded = [];
}
