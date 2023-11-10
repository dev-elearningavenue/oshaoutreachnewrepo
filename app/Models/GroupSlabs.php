<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSlabs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'min_slab' => 'array',
        'max_slab' => 'array',
        'slab_price' => 'array'
    ];
}
