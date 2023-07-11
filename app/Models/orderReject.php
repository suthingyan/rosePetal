<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderReject extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','name','phone','address','subCategory','productCode','title','quantity','price','totalPrice','product_id'
    ];
}
