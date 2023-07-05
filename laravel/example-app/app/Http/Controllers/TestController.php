<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function test(Request $request)
    // {
    //     $company = $request->company;
    //     return $company;
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Student;
        $product->company = $request->company;
        $product->product = $request->product;
        $product->save();
        return Student::all();
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
    public function update(Request $request, $id)
    {
        $product = Student::find($id);
        $product->product = $request->product;
        $product->save();
        return Student::all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Student::find($id);
        $product->delete();
        return Student::all();
    }
}
