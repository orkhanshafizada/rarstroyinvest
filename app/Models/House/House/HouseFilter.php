<?php

namespace App\Models\House\House;

use App\Models\House\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HouseFilter extends Pivot
{
    use HasFactory;

    protected $table = 'houses_filters';

    protected $guarded = [];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }
}
