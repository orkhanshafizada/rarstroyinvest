<?php

namespace App\Models\House\House;

use App\Models\House\Structure\Structure;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HouseStructure extends Pivot
{
    use HasFactory;

    protected $table = 'houses_structures';

    protected $guarded = [];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }
}
