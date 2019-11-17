<?php

namespace App\Http\Controllers\Admin;

use App\AuthorName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthorController extends Controller
{

    public function index()
    {
        $softDeletedAuthors = AuthorName::onlyTrashed()->get();
        $authors = AuthorName::all();

        return view('admin.author', compact('authors', 'softDeletedAuthors'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);

        AuthorName::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),

        ]);

        Session::flash('success','Successfully created.');
        return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $author = AuthorName::findOrFail($id);
        return view('admin.author-edit', compact('author'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        AuthorName::findOrFail($id)->update([
           'name' => $request->name,
        ]);
        Session::flash('updated','Updated Successfully.');
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        AuthorName::findOrFail($id)->delete();
        Session::flash('deleted','Deleted Successfully.');
        return redirect()->route('index');
    }

    public function restore($id){

        AuthorName::onlyTrashed()->find($id)->restore();
        Session::flash('success','Restored Successfully.');
        return back();

    }
    public function permanentDelete($id){
        AuthorName::onlyTrashed()->find($id)->forceDelete();
        Session::flash('deleted','Permanently Deleted.');
        return back();
    }
}
