<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schools = School::all();
        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('description');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $input['description'] = $request->description;
        $school = School::create($input);
        Session::flash('created_school', 'L\'école ' . $school->name . ' a été ajoutée avec succès.');
        return redirect(route('admin.schools.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $school = School::findOrFail($id);
        return view('admin.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $school = School::findOrFail($id);
        $input = $request->except('description');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $input['description'] = $request->description;
        $school->update($input);
        Session::flash('updated_school', 'L\'école ' . $school->name . ' a été modifiée avec succès.');
        return redirect(route('admin.schools.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $school = School::findOrFail($id);
        $school->delete();
        Session::flash('deleted_school', 'L\'école ' . $school->name . ' a été supprimée avec succès.');
        return redirect(route('admin.schools.index'));
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(Request $request)
    {
        $checkboxes = $request->checkboxArray;
        $schools = array();
        foreach ($checkboxes as $id) {
            $schools[+$id] = School::findOrFail(+$id);
            $schools[+$id]->delete();
        }
        Session::flash('deleted_schools', $schools);
        return redirect(route('admin.schools.index'));
    }
}
