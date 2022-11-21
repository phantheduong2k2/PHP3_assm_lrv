<?php

namespace App\Http\Controllers;



use App\Http\Requests\StoreAttributesRequest;
use App\Http\Requests\UpdateAttributesRequest;
use App\Models\AttributeProduct;
use App\Models\product;
use App\Models\Attributes;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attributes::select('id', 'name','value')
        ->paginate(5);

        return view('admin.attribute.list',[
            'attr_list' => $attributes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttributesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $attributes = new Attributes();
    //     $attributes = $request->all();
    //  $attributes =      $attributes->save();
    Attributes::create($request->all());
        return redirect(Route('attribute-create'))->with('msg-suc', 'Bạn đã thêm thành công thuôc tính!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function show(Attributes $attributes, $id)
    {

         $attributes = Attributes::find($id);


         return view('admin.attribute.detail',[
            'attr_detail' => $attributes

         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function edit(Attributes $attributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttributesRequest  $request
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attributes $attributes)
    {
        //
    }


    public function destroy($id){

         $attributes = Attributes::find($id);

        $attributesPro = $attributes->attributesPro()->get();

        foreach($attributesPro as $item){
            AttributeProduct::destroy($item->id);
        }


        if($id){
            Attributes::destroy($id);
        }




          return redirect(Route('attribute-list'))->with('msg-dl', 'xóa thành công thuộc tính');
    }

    /**`
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attributes  $attributes
     * @return \Illuminate\Http\Response
     */

}
