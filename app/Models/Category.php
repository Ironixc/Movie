<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $_table = 'category';
    protected $_fillable=[
        "category_name"
    ];
    public $timestamps = true;
}
