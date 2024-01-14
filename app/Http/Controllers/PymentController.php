<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use App\Models\Pyment;
use Illuminate\Http\Request;

class PymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pyments = Pyment::orderBy('id','DESC')->paginate(5);
        return view('pyments.index', compact('pyments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $custumers = Custumer::all();
        return view('pyments.create', compact('custumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'custumer_id'=>'required',
            'date'=>'required'
        ]);
        $pyment = Pyment::create([
            'custumer_id'=>$request->custumer_id,
            'date'=>$request->date,
        ]);
        $pyment->save();
        return redirect()->route('pyments.index')->with('success','Item Added SuccesFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pyment $pyment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pyment $pyment)
    {
        $custumers = Custumer::all();
        return view('pyments.edit', compact('pyment','custumers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pyment $pyment)
    {
        $request->validate([
            'custumer_id'=>'required',
            'date',
        ]);
        $pyment->fill([
            'custumer_id'=>$request->custumer_id,
            'date'=>$request->date,
        ]);
        $pyment->save();
        return redirect()->route('pyments.index')->with('success','Item Update SuccesFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pyment $pyment)
    {
        $pyment->delete();
        return redirect()->route('pyments.index')->with('success','Item Delete SuccessFully');
    }
}
