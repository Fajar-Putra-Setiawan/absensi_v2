<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;

        $classname =  Kelas::all();
        return view('classteacher.index',compact('classname', 'name', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        return view('classteacher.create', compact('name', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'class_name'=>'required'
        ]);

        $response = Kelas::create([
            'class_name' => $request->class_name,
        ]);
        if ($response) {
            return redirect()->route('classteacher.index')->with('success', 'Subject created successfully');
        }
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
        $name = Auth::user()->name;
        $role = Auth::user()->role;
        $classDetail = Kelas::find($id);
        return view('classteacher.edit', compact('classDetail', 'name', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'class_name'=>'required'
        ]);

        $updateClass = Kelas::find($id);
        $response = $updateClass->update([
            'class_name' => $request->name_subject,
        ]);

        if ($response) {
            return redirect()->route('classteacher.index')->with('success', 'Subject updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteClass = Kelas::find($id);
        $response = $deleteClass->delete();
        if ($response) {
            return redirect()->route('classteacher.index')->with('success', 'Subject deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
