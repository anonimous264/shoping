<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::orderBy('id','DESC')->paginate(5);
        return view('sellers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('sellers.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'name' => 'required'
        ]);
        $seller = Seller::create([
            'product_id'=>$request->product_id,
            'name'=>$request->name
        ]);
        $seller->save();
        return redirect()->route('sellers.index')->with('success','Item Added SuccesFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        $products = Product::all();
        return view('sellers.edit', compact('seller','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        $request->validate([
            'product_id'=>'required',
            'name' => 'required'
        ]);
        $seller -> fill([
            'product_id'=>$request->product_id,
            'name'=>$request->name
        ]);
        $seller->save();
        return redirect()->route('sellers.index')->with('success','Item Update SuccesFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('sellers.index')->with('success','Item Delete SuccessFully');
    }
}
