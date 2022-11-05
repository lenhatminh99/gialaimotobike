<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_id' , 'category_id' , 'product_name' , 'product_desc', 'product_price','product_image','product_status'
];

    protected $primaryKey = 'product_id';
    protected $table = 'tbl_products';

    // public function connectToCategoryProduct()
    // {
    //     return $this->hasOne(CategoryProduct::class, 'category_id');
    // }
}