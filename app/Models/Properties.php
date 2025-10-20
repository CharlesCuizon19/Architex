<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'description',
        'property_thumbnail',
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }

    public function blocks()
    {
        return $this->hasMany(Block::class, 'property_id');
    }
}
