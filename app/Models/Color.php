<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable=[
        'color_id','color'];
        public function pdtColor(){
            return $this->hasMany(ProductColor::class,'color_id','product_colors_id');
        }
}
