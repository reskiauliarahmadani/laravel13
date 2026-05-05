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
        return view('student.index' , 
        ['tittle' => 'Student',
        'students' => Student::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create' , ['tittle' => 'create student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|digits:11|numeric',
    
    ],
    [
        'name.required' => 'Nama wajib diisi',
        'name.max' => 'Nama tidak boleh lebih dari :max karakter',
        'nim.required' => 'NIM wajib diisi',
        'nim.digits' => 'NIM harus terdiri dari :digits digit',
        'nim.numeric' => 'NIM harus berupa angka',
    ]);

    Student::create($validated);
    
    return to_route('student.index')->withSuccess('Student created successfully');

    return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit' , 
        ['tittle' => 'Edit Student',
        'student' => $student,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'nim' => 'required|digits:11|numeric',
        
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'nim.required' => 'NIM wajib diisi',
            'nim.digits' => 'NIM harus terdiri dari :digits digit',
            'nim.numeric' => 'NIM harus berupa angka',
        ]);

        $student->update($validated);
        
        return to_route('student.index')->withSuccess('Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete($student);
        
        return to_route('student.index')->withSuccess('Student deleted successfully');
    }
}