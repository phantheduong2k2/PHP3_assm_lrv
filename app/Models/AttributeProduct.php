<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    protected $table = 'attribute_products';
    protected $fillable = [
        'id',
        'pro_id',
        'attr_pro_id',
        'created_at',
        'updated_at'
    ];


    use HasFactory;
}
