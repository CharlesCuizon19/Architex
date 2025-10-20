<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotsImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'lots_id',
        'image',
    ];

    public function lots()
    {
        return $this->belongsTo(Lots::class, 'lots_id');
    }
}
