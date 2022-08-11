<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    public function products(){
        return $this->hasMany(product::class, 'categorie_id', 'id');
    }

    public function attributes()
    {
        return $this->belongsToMany(attributes::class ,'attribute_products', 'pro_id','attr_pro_id' );
    }


}
