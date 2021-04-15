<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    //
    public function writePost(){
        
        return view('writepost');
    }

    public function addCategory(){
        
        return view('add_category');
    }

    public function storeCategory(Request $request){


        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
            
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
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);

        }
    }

    
}
