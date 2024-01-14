<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Custumer;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $custumers = Custumer::all();
        return view('categories.create', compact('custumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'custumer_id'=>'required',
            'name'=>'required',
            'type'=>'required',
        ]);
        $category = Category::Create([
            'custumer_id'=>$request->custumer_id,
            'name'=>$request->name,
            'type'=>$request->type,
        ]);
        $category->save();
        return redirect()->route('categories.index')->with('success','Item Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $custumers = Custumer::all();
        return view('categories.edit', compact('category','custumers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'custumer_id'=>'required',
            'name'=>'required',
            'type'=>'required',
        ]);
        $category->fill([
            'custumer_id'=>$request->custumer_id,
            'name'=>$request->name,
            'type'=>$request->type,
        ]);
        $category->save();
        return redirect()->route('categories.index')->with('success','Item Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Item Delete');
    }
}
