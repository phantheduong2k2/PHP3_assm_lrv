<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'avatar',
        'name_pro',
        'price',
        'pro_size',
        'pro_color',
        'quantity',
        'user_id',
        'created_at',
        'updated_at'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id' );
     }


}
