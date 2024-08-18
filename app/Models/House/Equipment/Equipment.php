<?php

namespace App\Models\House\Equipment;

use App\Models\House\House\House;
use App\Models\House\Structure\Structure;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model implements TranslatableContract
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
        'title',
        'content'
    ];

    /**
     * Get the house that owns the equipment.
     */
    public function house()
    {
        return $this->belongsTo(House::class);
    }

    /**
     * Get the structure that owns the equipment.
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }
}
