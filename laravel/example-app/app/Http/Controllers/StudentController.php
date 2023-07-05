<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); //eloquent ORM
        return view('index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->mobile_number = $request->mobile_number;
        $student->email = $request->email;
        $student->branch_select = $request->branch_select;
        $student->hostel = $request->hostel;
        $student->add_subjects = $request->subject;
        $student->permanent_address = $request->permanent_address;
        $student->save();
        return redirect('/');
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
        $student = Student::find($id);
        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->mobile_number = $request->mobile_number;
        $student->email = $request->email;
        $student->branch_select = $request->branch_select;
        $student->permanent_address = $request->permanent_address;
        $student->save();
        return Student::all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return Student::all();
    }
}
