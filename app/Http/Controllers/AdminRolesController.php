<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Session;

class AdminRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
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
        $role = Role::create($input);
        Session::flash('created_role', 'Le rôle ' . $role->name . ' a été ajouté.');
        return redirect(route('admin.roles.index'));
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
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', compact('role'));
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
        $role = Role::findOrFail($id);
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $role->update($input);
        Session::flash('updated_role', 'Le rôle ' . $role->name . ' a été modifié.');
        return redirect(route('admin.roles.index'));
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
        $role = Role::findOrFail($id);
        $role->delete();
        Session::flash('deleted_role', 'Le rôle ' . $role->name . ' a été supprimé.');
        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(Request $request) {
        $checkboxes = $request->checkboxArray;
        $roles = array();
        foreach ($checkboxes as $id) {
            $roles[+$id] = Role::findOrFail(+$id);
            $roles[+$id]->delete();
        }
        Session::flash('deleted_roles', $roles);
        return redirect(route('admin.roles.index'));
    }
}
