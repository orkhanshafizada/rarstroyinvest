<?php

namespace App\Models\House\House;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HouseStructure extends Pivot
{
    use HasFactory;

    protected $table = 'houses_structures';

    protected $guarded = [];
}
