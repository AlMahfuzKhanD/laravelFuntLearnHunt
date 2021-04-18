<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    //

    public function index(){
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->paginate(3);
        return view('index',compact('post'));
    }
    

    public function addCategory(){
        
        return view('add_category');
    }

   
    

    public function storeCategory(Request $request){


        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:3',
            'slug' => 'required|unique:categories|max:25|min:3',
            
        ]);


        $data = array();
        $data['name']= $request->name;
        $data['slug']= $request->slug;

       // return response()->json($data);
        $category = DB::table('categories')->insert($data);
        if($category){
            $notification = array(
                'message'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);

        }
    }

    public function allCategory(){
        $data = DB::table('categories')->get();
        //return response()->json($data);
        //return view('all_category', ['data'=>$data]);
        return view('all_category', compact('data'));
        

    }

    public function viewCategory($id){
        $data = DB::table('categories')->where('id', $id)->first();
        //return response()->json($data);
        return view('category_view')->with('data',$data);
    }

    public function deleteCategory($id){
        $delete = DB::table('categories')->where('id', $id)->delete();

        if($delete){
            $notification = array(
                'message'=>'Successfully Deleted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function editCategory($id){
        $data = DB::table('categories')->where('id', $id)->first();
        return view('edit_category',compact('data'));

    }

    public function updateCategory(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:25|min:4',
            
        ]);


        $data = array();
        $data['name']= $request->name;
        $data['slug']= $request->slug;

       // return response()->json($data);
        $category = DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification = array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            $notification = array(
                'message'=>'Nothing to Update',
                'alert-type'=>'error'
            );
            return redirect()->route('all.category')->with($notification);

        }
    }

    
}
