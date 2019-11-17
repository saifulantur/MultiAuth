<?php

namespace App\Http\Controllers;

use App\AuthorName;
use App\PdfList;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Session;
class PdfListController extends Controller
{
    public function addPdf(){
        $authors = AuthorName::all();
//        print_r(uniqid());
        return view('frontend.store-pdf', compact('authors'));
    }


    public function storePdf(Request $request){
        $userId = Auth::id();
        $pdf = $request->pdf_file;
        $fileSize = $pdf->getSize();
        $request->validate([
            'book_name' => 'required',
            'author_id' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:8000',

        ]);


        if($request->hasFile('pdf_file')){
//            print_r($fileSize)
//            if($fileSize>2000){
//                print_r('size besi');
//            }else{
//                print_r('size_kom');
//            }
            $file = $request->file('pdf_file');
            $fileName = uniqid().$file->getClientOriginalName();

            //Move Uploaded File
            $destinationPath = 'uploads/pdf/';
            $file->move($destinationPath,$fileName);


        }//end of if condition
        PdfList::insert([
            'book_name' => $request->book_name,
            'author_id' => $request->author_id,
            'pdf_file' => $fileName,
            'user_id' => $userId,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

}
