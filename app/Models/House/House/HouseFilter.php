<?php

namespace App\Models\House\House;

use App\Models\House\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class HouseFilter extends Pivot
{
    use HasFactory, SoftDeletes;

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
