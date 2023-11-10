<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imagePath', 'title', 'description', 'price', 'discounted_price'];

    protected $casts = [
      'promotion_price' => 'array'
    ];

    public function seoTags(){
        return $this->hasMany(SEO_Tag::class);
    }

    public function faqs(){
        return $this->hasMany(FAQ::class);
    }

    public function getPlainImagePathAttribute()
    {
       return str_replace("images/", "images/without-text/", $this->imagePath);
    }
}
