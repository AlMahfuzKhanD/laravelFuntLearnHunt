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
                  @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                      <a href="{{ URL::to('edit_category/'.$item->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ URL::to('delete_category/'.$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                      <a href="{{ URL::to('view_category/'.$item->id) }}" class="btn btn-success">View</a>
                    </td>
                    
                  </tr> 
                  @endforeach
                  
                  
                </tbody>
              </table>
        </div>
    </div>
  </div>

  @endsection