<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrainingShipped;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $categories = Category::all();
        return view('admin.users.create', compact('roles', 'categories'));
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
        $input = $request->except('trainings');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->trainings()->sync($request->trainings);
        if (count($request->trainings) > 0) Mail::to($user->email)->send(new TrainingShipped($request->trainings));
        Session::flash('created_user', 'L\'utilisateur ' . $user->name . ' a été ajouté.');
        return redirect(route('admin.users.index'));
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        $categories = Category::all();
        $user_trainings = array();
        foreach ($user->trainings as $training) {
            $user_trainings[] = $training->id;
        }
        return view('admin.users.edit', compact('user', 'roles', 'categories', 'user_trainings'));
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
        $user = User::findOrFail($id);
        $input = $request->except(['password', 'trainings']);
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        if ($request->password) $input['password'] = Hash::make($request->password);
        $user->update($input);
        $user->trainings()->sync($request->trainings);
        if (count($request->trainings) !== count($user->trainings)) Mail::to($user->email)->send(new TrainingShipped($request->trainings));
        Session::flash('updated_user', 'L\'utilisateur ' . $user->name . ' a été modifié.');
        return redirect(route('admin.users.index'));
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
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('deleted_user', 'L\'utilisateur ' . $user->name . ' a été supprimé.');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(Request $request) {
        $checkboxes = $request->checkboxArray;
        $users = array();
        foreach ($checkboxes as $id) {
            $users[+$id] = User::findOrFail(+$id);
            $users[+$id]->delete();
        }
        Session::flash('deleted_users', $users);
        return redirect(route('admin.users.index'));
    }
}
