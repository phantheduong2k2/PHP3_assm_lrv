<?php

namespace App\Models;

use Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
         'id',
         'name',
         'price',
         'avatar',
         'description',
         'status',
         'categorie_id',
         'created_at',
         'updated_at'
    ];

    public function products(){
        return $this->hasMany(product::class, 'categorie_id', 'id');
    }

     public function category(){
        return $this->belongsTo(Category::class,'categorie_id', 'id' );
     }

     public function attributes()
    {
        return $this->belongsToMany(attributes::class ,'attribute_products', 'pro_id','attr_pro_id' );
    }

    public function attributeProduct(){
        return $this->hasMany(AttributeProduct::class, 'attr_pro_id', 'id');
    }


}
