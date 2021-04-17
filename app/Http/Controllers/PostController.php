<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    //
    //protected 
    public function writePost(){
        $category = DB::table('categories')->get();
        return view('writepost', compact('category'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required | max:125',
            'details' => 'required | max:300',
            'image' => 'mimes:jpeg,jpg,png | max:1000',
            
        ]);

        $data = array();
        $data['title']= $request->title;
        $data['category_id']= $request->category_id;
        $data['details']= $request->details;
        $image= $request->file('image');
        if ($image) {
            # code...

            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image']=$image_url;

            DB::table('posts')->insert($data);
            $notification = array(
                'message'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
            

        } else {
            # code...
            DB::table('posts')->insert($data);
            $notification = array(
                'message'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }

    }


    public function allPost(){
        // $post = DB::table('posts')->get();
        $post = DB::table('posts')
        ->join('categories','posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->get();
        return view('allpost', compact('post'));
    }

    public function viewPost($id){
        $post = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name')
        ->where('posts.id',$id)
        ->first();
        return view('view_post', compact('post'));
    }

    public function editPost($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id',$id)->first();

        return view('edit_post', compact('category','post'));

    }


    public function updatePost(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required | max:125',
            'details' => 'required | max:300',
            'image' => 'mimes:jpeg,jpg,png | max:1000',
            
        ]);

        $data = array();
        $data['title']= $request->title;
        $data['category_id']= $request->category_id;
        $data['details']= $request->details;
        $image= $request->file('image');
        if ($image) {
            # code...

            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/frontend/image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_image);
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('all.post')->with($notification);
            

        } else {
            # code...
            $data['image']=$request->old_image;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('all.post')->with($notification);
        }
    }


} //end controller
