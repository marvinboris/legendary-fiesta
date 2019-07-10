<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.news.create');
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
        $input['user_id'] = Auth::id();
        $news = News::create($input);
        Session::flash('created_new', 'L\'actualité ' . $news->title . ' a été créée avec succès.');
        return redirect(route('admin.news.index'));
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
        $news = News::findOrFail($id);
        $input = $request->except('description');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        $input['description'] = $request->description;
        $news->update($input);
        Session::flash('updated_new', 'L\'actualité ' . $news->title . ' a été modifiée avec succès.');
        return redirect(route('admin.news.index'));
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
        $news = News::findOrFail($id);
        $news->delete();
        Session::flash('deleted_new', 'L\'actualité ' . $news->title . ' a été supprimée avec succès.');
        return redirect(route('admin.news.index'));
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
        $news = array();
        foreach ($checkboxes as $id) {
            $news[+$id] = News::findOrFail(+$id);
            $news[+$id]->delete();
        }
        Session::flash('deleted_news', $news);
        return redirect(route('admin.news.index'));
    }
}
