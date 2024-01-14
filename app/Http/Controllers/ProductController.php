<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Custumer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $custumers = Custumer::all();
        return view('products.create', compact('categories', 'custumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'custumer_id'=>'required',
            'name'=>'required',
        ]);
        $product = Product::create([
            'category_id' => $request->category_id,
            'custumer_id' => $request->custumer_id,
            'name' => $request->name
        ]);
        $product->save();
        return redirect()->route('products.index')->with('success','Item Added SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $custumers = Custumer::all();
        return view('products.edit', compact('product','categories','custumers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'=>'required',
            'custumer_id'=>'required',
            'name'=>'required',
        ]);
        $product -> fill([
            'category_id' => $request->category_id,
            'custumer_id' => $request->custumer_id,
            'name' => $request->name
        ]);
        $product->save();
        return redirect()->route('products.index')->with('success','Item Update SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Item Delete SuccesFully');
    }
}
