<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.student.index', [
            "title" => 'Student',
            'active' =>  "student",
            'students' => Student::latest()->filter(request(['search']))->paginate(5),
        ]);
    }

    public function index2()
    {

        $title = '';
        $active = '';
        if (request('kelas'))
        {
            $kelas = Kelas::firstWhere('kelas', request('kelas'));
            $title = ' di Class ' . $kelas->kelas;
            $active = "class";
        } else {
            $title = 'Student';
            $active = "student";
        }


        return view('student', [
            "title" => $title,
            'active' =>  $active,
            'students' => Student::latest()->filter(request(['search','kelas']))->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.student.create',[
            "title" => "Student",
            'active' =>  'student',
            'classs' =>  Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'kelas_id' => 'required',
            'alamat' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

        $duplicated = Student::where('nis',$validatedData['nis'])->first();
        if ($duplicated) {
            return back()->withInput($request->except('nis'))->with('error', 'Duplicated Entry For NIS!');
        }

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Student::create($validatedData);

        return redirect('/dashboard/student')->with('success','New Student has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('dashboard.student.show',[
            'title' => "Student",
            'active' =>  'student',
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('dashboard.student.edit', [
            "title" => "Student",
            'active' =>  'student',
            'student' => $student,
            'classs' =>  Kelas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Student $student)
    {
        $rules = [
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'kelas_id' => 'required',
            'alamat' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Student::where('id', $student->id)->update($validateData);

        return redirect('/dashboard/student')->with('success','Student has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if($student->image) {
            Storage::delete($student->image);
        }

        Student::destroy($student->id);
        return redirect('/dashboard/student')->with('success', 'Student has been deleted!');
    }
}
