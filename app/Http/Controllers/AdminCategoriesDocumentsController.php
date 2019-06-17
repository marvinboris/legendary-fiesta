<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Document;
use Illuminate\Support\Facades\Session;

class AdminCategoriesDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $documents = Document::all();
        return view('admin.categories.documents.index', compact('documents'));
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
        return view('admin.categories.documents.create', compact('categories'));
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
        $input = $request->except('categories');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        if ($file = $request->file('path')) {
            $fileName = time() . $file->getClientOriginalName();
            $file->move('documents', $fileName);
            $input['path'] = htmlspecialchars($fileName);
        }
        $document = Document::create($input);
        $document->categories()->sync($request->categories);
        Session::flash('created_document', 'Le document ' . $document->name . ' a été ajouté.');
        return redirect(route('admin.categories.documents.index'));
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
        $document = Document::findOrFail($id);
        $categories = Category::all();
        $document_categories = array();
        foreach ($document->categories as $category) {
            $document_categories[] = $category->id;
        }
        return view('admin.categories.documents.edit', compact('document', 'categories', 'document_categories'));
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
        $document = Document::findOrFail($id);
        $input = $request->except('categories');
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }
        if ($file = $request->file('path')) {
            unlink(public_path() . '/documents/' . $document->path);
            $fileName = time() . $file->getClientOriginalName();
            $file->move('documents', $fileName);
            $input['path'] = htmlspecialchars($fileName);
        }
        $document->update($input);
        $document->categories()->sync($request->categories);
        Session::flash('updated_document', 'Le document ' . $document->name . ' a été modifié.');
        return redirect(route('admin.categories.documents.index'));
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
        $document = Document::findOrFail($id);
        $document->delete();
        unlink(public_path() . '/documents/' . $document->path);
        Session::flash('deleted_document', 'Le document ' . $document->name . ' a été supprimé.');
        return redirect(route('admin.categories.documents.index'));
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(Request $request) {
        $checkboxes = $request->checkboxArray;
        $documents = array();
        foreach ($checkboxes as $id) {
            $documents[+$id] = Document::findOrFail(+$id);
            $documents[+$id]->delete();
            unlink(public_path() . '/documents/' . $documents[+$id]->path);
        }
        Session::flash('deleted_documents', $documents);
        return redirect(route('admin.categories.documents.index'));
    }
}
