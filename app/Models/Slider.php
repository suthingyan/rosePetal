<?php

namespace App\Models;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
    ];
    public function slider()
{
    return $this->hasMany(Slider::class, 'title','title');
}
    
}
