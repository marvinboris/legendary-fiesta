<?php

namespace App\Http\Controllers;

use App\Learner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminLearnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $learners = Learner::all();
        return view('admin.learners.index', compact('learners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.learners.create');
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
        $input = $request->except('rank');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $input['rank'] = $request->rank;
        $learner = Learner::create($input);
        Session::flash('created_learner', 'L\'apprenant ' . $learner->name . ' a été ajouté avec succès.');
        return redirect(route('admin.learners.index'));
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
        $learner = Learner::findOrFail($id);
        return view('admin.learners.edit', compact('learner'));
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
        $learner = Learner::findOrFail($id);
        $input = $request->except('rank');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $input['rank'] = $request->rank;
        $learner->update($input);
        Session::flash('updated_learner', 'L\'apprenant ' . $learner->name . ' a été modifié avec succès.');
        return redirect(route('admin.learners.index'));
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
        $learner = Learner::findOrFail($id);
        $learner->delete();
        Session::flash('deleted_learner', 'L\'apprenant ' . $learner->name . ' a été supprimée avec succès.');
        return redirect(route('admin.learners.index'));
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
        $learners = array();
        foreach ($checkboxes as $id) {
            $learners[+$id] = Learner::findOrFail(+$id);
            $learners[+$id]->delete();
        }
        Session::flash('deleted_learners', $learners);
        return redirect(route('admin.learners.index'));
    }
}
