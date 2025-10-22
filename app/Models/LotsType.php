<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotsType extends Model
{
    use HasFactory;

    protected $table = 'lots_types';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'type_name',
    ];

    public function lots()
    {
        return $this->hasMany(Lots::class, 'type_id');
    }
}
