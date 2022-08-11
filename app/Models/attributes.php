<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = 'attributes';
    protected $fillable = [
        'id',
        'name',
        'value',
        'created_at',
        'updated_at'
    ];

    public function attributesPro()
    {
        return $this->hasMany(AttributeProduct::class ,'attr_pro_id','id' );
    }


    use HasFactory;
}
