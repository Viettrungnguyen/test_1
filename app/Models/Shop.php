<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // co the dien vao
    protected $fillable = ['name', 'address', 'phone', 'email'];
}
