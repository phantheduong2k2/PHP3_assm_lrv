<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

class ProductHomeController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::select('id', 'name')->get();
        $name = $request->get('name');
        if($name){
            $product = product::Where('name','like','%'. $name. '%')
            ->where('status', '=' , 0)
           ->paginate(10);
        }else{
            $product = product::select('id','name', 'price', 'avatar', 'description')
            ->where('status', '=', 0)
            ->paginate(15);
        }
        if(Auth::check()){

            $cart = Cart::select('*')
            ->where('user_id', Auth::id() )
            ->get();

        }

        return view('client.shop.list', [
            'product_list' => $product,
            'category_list' => $category,
            'name' => $name,
            'cart' =>  $cart,
        ]);
    }

    public function show($id)
    {


        $product_detail  =  product::find($id);

        $productRt = product::where('categorie_id',$product_detail->categorie_id )
        ->get();

        $productColor = $product_detail->attributes()
        -> where('name','color')
         ->get();

         $productSize = $product_detail->attributes()
         -> where('name','size')
          ->get();

          if(Auth::check()){

            $cart = Cart::select('*')
            ->where('user_id', Auth::id() )
            ->get();

        }

        return view('client.shop.detail',compact('product_detail','productColor','productSize','productRt','cart' ));
    }

    public function productCategory($id){
          $category = Category::find($id);
          $categoryPro = $category->products()->get();
          if(Auth::check()){

            $cart = Cart::select('*')
            ->where('user_id', Auth::id() )
            ->get();
          }
          return view('client.shop.productCate',compact('category','categoryPro','cart'));

    }
}
