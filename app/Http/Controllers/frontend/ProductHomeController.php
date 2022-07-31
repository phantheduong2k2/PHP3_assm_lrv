<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductHomeController extends Controller
{
    public function index()
    {
        $product = product::select('id','name', 'price', 'avatar', 'description')
            ->where('status', '=', 0)
            ->paginate(15);
        return view('client.shop.list', [
            'product_list' => $product
        ]);
    }

    public function show($id)
    {
        $product_detail  =  product::find($id);
        return view('client.shop.detail',compact('product_detail'));
    }
}
