<?php

namespace App\Models\Product;

use Database\Factories\Product\ProductCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class ProductCategory extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function newFactory()
    {
        return ProductCategoryFactory::new();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}
