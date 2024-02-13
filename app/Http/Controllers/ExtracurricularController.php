<?php

namespace App\Http\Controllers;

use App\Models\extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('extracurricular_with_database.index', [
            "title" => "Extracurricular",
            'active' =>  'extra',
            'extras' => extracurricular::all(),
        ]);
    }

    public function index2()
    {
        return view('extracurricular', [
            "title" => "Extracurricular",
            'active' =>  'extra',
            'extras' => Extracurricular::all1(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extracurricular_with_database.create', [
            "title" => "Extracurricular",
            'active' =>  'extra',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'nama' => 'required|max:255',
            'pembina' => 'required|max:255',
            'deskripsi' => 'required',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        extracurricular::create($validatedData);

        return redirect('/database2')->with('success','New Extra has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $extra = extracurricular::findOrFail($id);
        return view('extracurricular_with_database.edit', [
            "title" => "Extracurricular",
            'active' =>  'extra',
            'extra' => $extra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $extra = extracurricular::findOrFail($id);
        $rules = [
            'image' => 'image|file|max:1024',
            'nama' => 'required|max:255',
            'pembina' => 'required|max:255',
            'deskripsi' => 'required',
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        extracurricular::where('id', $extra->id)->update($validateData);

        return redirect('/database2')->with('success','Extra has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $extra = extracurricular::findOrFail($id);
        if($extra->image) {
            Storage::delete($extra->image);
        }

        extracurricular::destroy($extra->id);
        return redirect('/database2')->with('success', 'Extra has been deleted!');
    }
}
