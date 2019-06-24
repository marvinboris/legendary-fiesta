<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Category;
use Illuminate\Support\Facades\Session;

class AdminTrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainings = Training::all();
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.trainings.create', compact('categories'));
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
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $training = Training::create($input);
        Session::flash('created_training', 'La formation ' . $training->name . ' a été ajoutée.');
        return redirect(route('admin.trainings.index'));
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
        $training = Training::findOrFail($id);
        $categories = Category::all();
        return view('admin.trainings.edit', compact('training', 'categories'));
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
        $training = Training::findOrFail($id);
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $training->update($input);
        Session::flash('updated_training', 'La formation ' . $training->name . ' a été modifiée.');
        return redirect(route('admin.trainings.index'));
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
        $training = Training::findOrFail($id);
        $training->delete();
        Session::flash('deleted_training', 'La formation ' . $training->name . ' a été supprimée.');
        return redirect(route('admin.trainings.index'));
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(Request $request) {
        $checkboxes = $request->checkboxArray;
        $trainings = array();
        foreach ($checkboxes as $id) {
            $trainings[+$id] = Training::findOrFail(+$id);
            $trainings[+$id]->delete();
        }
        Session::flash('deleted_trainings', $trainings);
        return redirect(route('admin.trainings.index'));
    }
}
