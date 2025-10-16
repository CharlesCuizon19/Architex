<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotCategory extends Model
{
    use HasFactory;

    protected $table = 'lot_categories';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'title',
        'subtitle',
        'image',
    ];
}
