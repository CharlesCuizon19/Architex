<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotsFloorPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lots_id',
        'floor_plan',
    ];

    public function lots()
    {
        return $this->belongsTo(Lots::class, 'lots_id');
    }
}
