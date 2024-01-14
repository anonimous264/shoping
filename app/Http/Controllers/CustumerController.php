<?php

namespace App\Http\Controllers;

use App\Models\Custumer;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CustumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custumers = Custumer::orderBy('id','DESC')->paginate(5);
        return view('custumers.index', compact('custumers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('custumers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $custumer =Custumer::Create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'address'=>$request->address
        ]);
        $custumer->save();
        return redirect()->route('custumers.index')->with('success',' Item Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Custumer $custumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Custumer $custumer)
    {
        return view('custumers.edit', compact('custumer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Custumer $custumer)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $custumer->fill([
            'name' => $request->name,
            'phone'=> $request->phone,
            'address'=>$request->address
        ]);
        $custumer->save();
        return redirect()->route('custumers.index')->with('success','Item Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Custumer $custumer)
    {
        $custumer->delete();
        return redirect()->route('custumers.index')->with('success','Item Delte');
    }
}
