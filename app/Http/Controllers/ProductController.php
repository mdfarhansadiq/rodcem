<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.product.index', ['products' => Product::where('user_id', Auth::id())->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.product.create',[
            'units'      => Unit::Where('company_id', auth('company')->id())->latest()->get(),
            'categories' => Category::Where('company_id', auth('company')->id())->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'      => 'required',
            'image'     => 'required',
            'category'  => 'required',
            'unit'      => 'required',
            'price'     => 'required',
        ]);


        $product =  new Product();
        $product->name          = $request->name;
        $product->price         = $request->price;
        $product->category_id   = $request->category;
        $product->unit_id       = $request->unit;
        $product->user_id       = Auth::id();

        $image    = $request->file('image');
        $name     = 'category-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/product');
        $image->move($location, $name);
        $product->image = $name;

        $product->save();

        return redirect()->route('shop.product.index')->with('success', 'Product Create Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('shop.product.edit', [
            'product' => $product,
            'units'      => Unit::Where('user_id', Auth::id())->latest()->get(),
            'categories' => Category::Where('user_id', Auth::id())->latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name'      => 'required',
            'category'  => 'required',
            'unit'      => 'required',
            'price'     => 'required',
        ]);


        $product->name          = $request->name;
        $product->price         = $request->price;
        $product->category_id   = $request->category;
        $product->unit_id       = $request->unit;
        $product->user_id       = Auth::id();

        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'category-' . '.' . uniqid(50) . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/product');
            $image->move($location, $name);
            $product->image = $name;
        }

        $product->save();
        return redirect()->route('shop.product.index')->with('success', 'Product Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {        
        $product->delete();
        return redirect()->route('shop.product.index')->with('success', 'Product Delete Successfull');
    }
}
