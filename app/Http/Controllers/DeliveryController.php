<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use App\Models\Delivery;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::orderBy('id','DESC')->paginate(5);
        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $custumers = Custumer::all();
        return view('deliveries.create', compact('custumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'custumer_id'=>'required',
            'date'=>'date'
        ]);
        $delivery = Delivery::create([
            'custumer_id'=>$request->custumer_id,
            'date'=>$request->date,
        ]);
        $delivery->save();
        return redirect()->route('deliveries.index')->with('success','Item Added SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        $custumers = Custumer::all();
        return view('deliveries.edit', compact('delivery','custumers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'custumer_id'=>'required',
            'date'=>'date'
        ]);
        $delivery -> fill([
            'custumer_id'=>$request->custumer_id,
            'date'=>$request->date,
        ]);
        $delivery->save();
        return redirect()->route('deliveries.index')->with('success','Item Update SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index')->with('success','Item Delete SuccesFully');
    }
}
