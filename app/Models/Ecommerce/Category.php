<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes; 

    public $timestamps = true;

    protected $fillable = [
        'category_name_ua','category_name_ru',
        'category_slug_ua','category_slug_ru',
        'category_icon',
        'category_description_ua','category_description_ru',
        'category_touches','category_rated',
        'category_status',
        'created_by','updated_by','deleted_by',
        
    ];
}
