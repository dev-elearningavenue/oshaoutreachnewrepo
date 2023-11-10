<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoReview extends Model
{
    use HasFactory;


    public function getCourseDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d F Y');
    }
}
