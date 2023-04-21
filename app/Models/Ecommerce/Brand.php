<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'brand_name',
        'drand_slug',
        'brand_description_ua',
        'brand_description_ru',
        'brand_touches',
        'brand_rated',
        'brand_image',
        'created_at',
        'updated_at',
        
    ];
}
