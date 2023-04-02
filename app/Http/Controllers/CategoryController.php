<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();

        return view('category', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:50',
        ]);
        
        Category::create($validatedData);
        return redirect('/category')->with('toast_success', 'Category Created Successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
        // dd($data);
        return view('admin/editcategory', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:50',
        ]);
        Category::where('id', $id)->update($validatedData);
        return redirect('/category')->with('toast_success', 'Category Updated Successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/category')->with('toast_success', 'Category Deleted Successfully!');;
    }
}
// $validated = $request->validate([
//     'name' => 'required',
//     'price' => 'required|numeric',
//     'description' => 'required',
//     'image' => 'required',
//     'category_id' => 'required'
// ]);

// Product::create([
//     'name' => $validated['product_name'],
//     'price' => $validated['product_price'],
//     'description' => $validated['product_description'],
//     'image' => $validated['product_image'],
//     'category_id' => $validated['category_id']
// ]);
// return redirect('/product');