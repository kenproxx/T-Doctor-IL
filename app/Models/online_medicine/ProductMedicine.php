<?php

namespace App\Models\online_medicine;

use App\Models\DrugIngredients;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_en', 'name_laos',
        'brand_name', 'brand_name_en', 'brand_name_laos',
        'category_id', 'object_', 'filter_', 'price', 'status',
        'description', 'description_en', 'description_laos',
        'thumbnail', 'gallery', 'unit_price'
    ];

    public function DrugIngredient()
    {
        return $this->hasMany(DrugIngredients::class,'product_id');
    }
}
