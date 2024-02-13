<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelas.index', [
            "title" => "Class",
            'active' =>  'class',
            'kelass' => Kelas::first()->filter(request(['search']))->paginate(6),
        ]);
    }

    public function index2()
    {
        return view('class', [
            "title" => "Class",
            'active' =>  'class',
            'kelass' => Kelas::first()->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelas.create',[
            "title" => "Class",
            'active' =>  'class',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required|max:255',
        ]);

        $duplicated = Kelas::where('kelas',$validatedData['kelas'])->first();
        if ($duplicated) {
            return back()->withInput()->with('error', 'Duplicated Entry For Class!');
        }

        Kelas::create($validatedData);

        return redirect('/dashboard/class')->with('success','New Class has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $class)
    {
        return view('dashboard.kelas.edit', [
            "title" => "Class",
            'active' =>  'class',
            'class' => $class,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $class)
    {
        $rules = [
            'kelas' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);

        Kelas::where('id', $class->id)->update($validateData);

        return redirect('/dashboard/class')->with('success','Class has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $class)
    {
        Kelas::destroy($class->id);
        return redirect('/dashboard/class')->with('success', 'Class has been deleted!');
    }
}
