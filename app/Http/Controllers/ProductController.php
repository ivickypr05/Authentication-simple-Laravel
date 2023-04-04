<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('category')->get();

        return view('home', $data);
    }
    public function product()
    {
        $data['products'] = Product::with('category')->get();

        return view('product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $data['categories'] = Category::all();
            return view('admin/add', $data);
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
            'price' => 'required|integer',
            'description' => 'required|string|min:5|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        // $image_name = $request->image->getClientOriginalName();
        // $image = $request->image->storeAs('image', $image_name);
        $image = $request->file('image')->store('product-image','public');
        $validatedData['image'] = $image;

        Product::create($validatedData);
        return redirect('/product')->with('toast_success', 'Product Created Successfully!');;
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
        $data['categories'] = Category::all();
        $data['product'] = Product::find($id);
        // dd($data);
        return view('admin/edit', $data);
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
            'price' => 'required|integer',
            'description' => 'required|string|min:5|max:255',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        
        $product = Product::find($id);
        if ($request->file('image')) {
            $image = $request->file('image')->store('product-image','public' );
            // dd($image);
            // delete
            File::delete('storage/' .  $product->image );
            // $product->delete();
            $validatedData['image'] = $image;
            // dd($validatedData['image']);
        }
        $product->update($validatedData);
        
        return redirect('/product')->with('toast_success', 'Product Updated Successfully!');;
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request, $id)
    // {
    //     Product::destroy($id);
    //     File::delete('storage/' . $request->image);
        
    //     return redirect('/product')->with('toast_success', 'Product Deleted Successfully!');;
    // }
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        File::delete('storage/' .  $product->image );
        $product->delete();
        return redirect('/product')->with('toast_success', 'Data successfully deleted');
    }
}
