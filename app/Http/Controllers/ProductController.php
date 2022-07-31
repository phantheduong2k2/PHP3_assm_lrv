<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
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
            ->with('category')
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
        $category = Category::select('id', 'name')->get();
        return view('admin.product.add', [
            'cate_list' => $category
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
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
            if ($request->hasFile('avatar')) {
                $product->avatar = $this->saveFile(
                    $request->avatar,
                    $request->name,
                    'images/product/'
                );
            } else {
                $product->avatar = '';
            }

            $product->save();
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
    public function edit(product $product, $id)
    {
        $category = Category::select('id', 'name')->get();
        $product = product::find($id);

        return view('admin.product.edit',[
           'cate_list' => $category,
           'pro_list' => $product
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
                'images/product/'
            );
        }

        $save = $product->save();
        return redirect(Route('product-list'))->with('msg-sc', 'them thanh cong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, $id)
    {
         if($id){
              product::destroy($id);
         }
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
