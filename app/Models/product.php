<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

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
}
