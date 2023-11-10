<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatePromotions extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function seoTags(){
        return $this->hasMany(SEO_Tag::class);
    }
}
