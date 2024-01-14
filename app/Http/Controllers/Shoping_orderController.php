<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use App\Models\Shoping_order;
use Illuminate\Http\Request;

class Shoping_orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoping_orders = Shoping_order::orderBy('id','DESC')->paginate(5);
        return view('shoping_orders.index', compact('shoping_orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $custumers = Custumer::all();
        return view('shoping_orders.create', compact('custumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'custumer_id'=>'required',
            'date',
        ]);
        $shoping_order = Shoping_order::create([
            'custumer_id'=>$request->custumer_id,
            'date'=>$request->date,
        ]);
        $shoping_order->save();
        return redirect()->route('shoping_orders.index')->with('success','Item Added SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
