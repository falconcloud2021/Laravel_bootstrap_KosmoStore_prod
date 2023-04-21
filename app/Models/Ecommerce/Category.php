<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'category_name_ua',
        'category_name_ru',
        'category_slug_ua',
        'category_slug_ru',
        'category_description_ua',
        'category_description_ru',
        'category_touches',
        'category_rated',
        'category_icon',
        'created_at',
        'updated_at',
        
    ];
}
