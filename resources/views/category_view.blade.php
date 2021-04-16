@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ route('write.post') }}" class="btn btn-danger">Add Post</a>
                <a href="{{ route('add.category') }}" class="btn btn-info">Add Category</a>
            
            <br><br>

            

            <table class="table">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->slug }}</td>
                    <td>
                      <a href="{{ URL::to('edit_category/'.$data->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ URL::to('delete_category/'.$data->id) }}" class="btn btn-danger">Delete</a>
                      
                    </td>
                    
                  </tr> 
                 
                  
                  
                </tbody>
              </table>
        </div>
    </div>
  </div>

  @endsection