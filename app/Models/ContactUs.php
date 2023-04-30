<?php

namespace App\Models;

use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    protected $fillable= ['title','description'];
    use HasFactory;
}
