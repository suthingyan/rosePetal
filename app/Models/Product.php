<?php

namespace App\Models;

use App\Models\Color;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id','title','subCategory','productCode','price','description','color','size','quantity',
        'image','category_id','sub_id'];
    public function color(){
        return $this->hasMany(Color::class,'product_id','color_id');
    }
    public function pdtColor(){
        return $this->hasMany(ProductColor::class,'product_id','product_id');
    }
   
}
