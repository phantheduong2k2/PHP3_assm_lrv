<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller

{

    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : $fileName;

        return $file->storeAs($folder, $fileName);
    }


      public function addCart(Request $request, $id){

        $request->validate([
            "pro_color"=>"required",

        ],[
            "required"=>"Bạn vui lòng chọn màu để có thể thêm sản phẩm vào giỏ hàng"
        ]);
               $user =  Auth::user();
               $cart = new Cart();
               $product = product::find($id);
               $cart->user_id = $user->id;
               $cart->name_pro = $product->name;
               $cart->avatar = $product->avatar;
               $cart->price = $product->price;
               $cart->quantity = $request->quantity;
               $cart->pro_size = $request->pro_size;
               $cart->pro_color = $request->pro_color;


               $cart->save();



               return redirect()->back();
      }

      public function viewCart(){
        if(Auth::check()){

            $cart = Cart::select('*')
            ->where('user_id', Auth::id() )
            ->get();

        }

          return view('client.cart.cart',[
            'cart' =>  $cart,

          ]);
      }
}
