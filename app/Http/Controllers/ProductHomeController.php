<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductHomeController extends Controller
{
    public function index(){
           $product = product::select('name', 'price','avatar','description' )->get();
           return view('client.shop.list',[
            'product_list' => $product
        ]);
    }
}
