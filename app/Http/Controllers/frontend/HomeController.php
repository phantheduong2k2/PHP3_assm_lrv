<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::select('id', 'name')->get();

        $name = $request->get('name');
        if($name){
            $product = product::Where('name','like','%'. $name. '%')
            ->where('status', '=' , 0)
           ->paginate(10);
        }else{
            $product = product::select('id','name', 'price','avatar','description' )
           ->where('status', '=' , 0)
           ->paginate(10);
        }


        return view('client.hompage.index',[
           'product_list' => $product,
           'name' => $name,
           'category_list' => $category
        ]);
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }


    //
}
