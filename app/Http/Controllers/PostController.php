<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\AuthorName;
use Carbon\Carbon;
use Auth;
use Session;
class PostController extends Controller
{
    public function store(Request $request){
//        print_r($request->all());
        $userId = Auth::id();
        print_r($userId);
        Post::insert([
            'image' => $request->image,
            'bookName' => $request->bookName,
            'description' => $request->description,
            'price'=> $request->price,
            'author_id' => $request->author_id,
            'user_id' => $userId,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    public function viewAd(){
        $userId = Auth::id();
        $Posts = Post::where('user_id', $userId)->get();
        return view('frontend.your-post', compact('Posts'));
    }

    public function editAd($id){


        $single_product_details = Post::findOrFail($id);
        if(Auth::id() == $single_product_details->user_id) {
            $authors = AuthorName::all();
            return view('frontend.edit-post', compact('single_product_details', 'authors'));
        }else{
            Session::flash('error','You are not eligible for this request');
            return redirect()->route('list.ad');
        }

    }

    public function updateAd(Request $request,$id){
        $single_product_details = Post::findOrFail($id);
        if(Auth::id() == $single_product_details->user_id) {

            Post::findOrFail($id)->update([
                'image' => $request->image,
                'bookName' => $request->bookName,
                'description' => $request->description,
                'price'=> $request->price,
                'author_id' => $request->author_id,
                'updated_at' => Carbon::now(),
            ]);

            Session::flash('updated','Updated Successfully.');
            return redirect()->route('list.ad');

        }
        else{
            Session::flash('error','You are not eligible for this request');
            return redirect()->route('list.ad');
        }
    }

    public function destroyAd($id)
    {
        Post::findOrFail($id)->delete();
        Session::flash('deleted','Deleted Successfully.');
        return redirect()->route('list.ad');
    }
}
