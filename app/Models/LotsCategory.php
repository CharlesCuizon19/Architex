<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotsCategory extends Model
{
    use HasFactory;

    protected $table = 'lots_categories';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'category_name',
    ];

    public function lots()
    {
        return $this->hasMany(Lots::class, 'category_id');
    }
}
