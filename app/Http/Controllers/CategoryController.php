<?php

namespace App\Http\Controllers;


use Yajra\Datatables\Datatables;
use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use Illuminate\Http\Request;
use Prophecy\Call\Call;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(  Request $request )
    {
        $search = $request->get('q');
        $data = Category::Where('name','like','%'. $search. '%')
        ->with('products')
        ->paginate(5);

        $data->appends(['q'=> $search]);

        return view('admin.category.list', [
            'list_data' => $data,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
    //    $categoryNew = new Category();
    //    $categoryNew->fill($request->all());
    //    $save = $categoryNew->save();
       Category::create($request->validated());
       return redirect(Route('category-list'))->with('msg-suc', 'Bạn đã thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category ,$id)
    {
       $data = Category::find($id);
        return view('admin.category.edit',['categorys'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();
        return redirect(Route('category-list'))->with('msg-edit', 'Bạn đã sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        Category::destroy($id);
        return redirect(Route('category-list'))->with('msg-dl', 'Bạn đã xóa thành công!');
    }
}
