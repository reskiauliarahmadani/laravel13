<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Pest\Support\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('student.index', [
        'title' => 'student',
        'students' => Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', ['title' => 'create student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|max:255',
        'nim' => 'required|dgits:11|numeric',
    ],[
        'name.requeired' => 'nama tidak boleh kosong',
        'name.max' => 'nama tidaklebih dari :max karakter',
        'nim.requeired' => 'nim tidak kosong',
        'name.digits' => 'nim wajib :digits digit',
        'name.numeric' => 'NIM wajib angka',

    ]);
    Student::created($validated);
    return to_route('student.index')->withsuccess('Data berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
       $validated = $request->validate([
         'name' => 'required|max:255',
        'nim' => 'required|dgits:11|numeric',
       ],[
        'name.requeired' => 'nama tidak boleh kosong',
        'name.max' => 'nama tidaklebih dari :max karakter',
        'nim.requeired' => 'nim tidak kosong',
        'name.digits' => 'nim wajib :digits digit',
        'name.numeric' => 'NIM wajib angka',
       ]);

       $student->update($validated);
       return to_route('student.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
      $student->delete($student);
      return to_route('student.index')->withSuccess('Data berhasil dihapus');
      
    }
}
