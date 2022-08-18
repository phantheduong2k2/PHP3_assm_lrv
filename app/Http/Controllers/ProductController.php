<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Http\Requests\Product\StoreProduct;
use App\Models\AttributeProduct;
use App\Models\product;
use App\Models\Attribute;
use App\Models\Attributes;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        if($name){
            $product = product::Where('name','like','%'. $name. '%')
            ->paginate(5);
        }else{
            $product = product::select('*')
            ->paginate(5);
        }


        return view('admin.product.list',[
            'product_list' => $product,
            'name' => $name
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $atributeColor = Attributes::where('name','color')->get();
        $atributeSize = Attributes::where('name','size')->get();
        $category = Category::select('id', 'name')->get();
        return view('admin.product.add', [
            'cate_list' => $category,
            'color'     => $atributeColor,
            'size'      => $atributeSize
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */

    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : $fileName;

        return $file->storeAs($folder, $fileName);
    }

    // Ham save file


    public function store(StoreProduct $request)
    {
        $product = new Product();
        $product->fill($request->all());
            if ($request->hasFile('avatar')) {
            $product->avatar = $this->saveFile(
                    $request->avatar,
                    $request->name,
                    'images/product'
                );
            } else {
                $product->avatar = '';
            }
            $product->save();

            foreach($request->attr_pro_id as $value){
             AttributeProduct::create([
                   'pro_id' => $product->id,
                   'attr_pro_id' =>$value
             ]);
      }

            return redirect(Route('product-list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $category = Category::select('id', 'name')->get();
        $product = product::find($id);

     $productColor = $product->attributes()
    -> where('name','color')
     ->get();
     $productSize = $product->attributes()
     -> where('name','size')
      ->get();


        return view('admin.product.edit',[

           'cate_list' => $category,
           'pro_list' => $product,
           'pro_color' => $productColor,
           'pro_size' =>  $productSize
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = product::find($id);
        $product->fill($request->all());
        if ($request->hasFile('avatar')) {
            $product->avatar = $this->saveFile(
                $request->avatar,
                $request->name,
                'images/product'
            );
        }

        $save = $product->save();
        return redirect(Route('product-list'))->with('msg-ed', 'Cập nhật thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, $id)
    {
        $productAttr = AttributeProduct::where('pro_id', $id)->get();

        foreach($productAttr as $item){
            AttributeProduct::destroy($item->id);
        }
              product::destroy($id);

      return redirect(Route('product-list'))->with('msg-dl', 'xoa thanh cong');
    }

    public function updateStatus($id){
        $statusUpdate = product::select('status')->where('id', $id)->first();
        if($statusUpdate->status == 0){
            $status = 1;
        }else{
            $status = 0;
        }
         product::where('id', $id)->update(['status'=> $status]);
         return redirect()->back();
    }

}
