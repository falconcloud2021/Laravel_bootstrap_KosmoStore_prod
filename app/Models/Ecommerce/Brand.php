<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes; 

    public $timestamps = true;

    protected $fillable = [
        'brand_name','brand_slug',
        'brand_logo',
        'brand_description_ua','brand_description_ru',
        'brand_touches','brand_rated',
        'brand_status',
        'created_by','updated_by','deleted_by',
        
    ];
}
