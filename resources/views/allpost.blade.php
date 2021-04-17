@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            
                <a href="{{ route('write.post') }}" class="btn btn-danger">Add Post</a>
               
            
            <br><br>

            

            <table class="table">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($post as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ URL::to( $item->image) }}" alt="no image" style="height: 40px; width:70px;"></td>
                    
                    <td>
                      <a href="{{ URL::to('edit_post/'.$item->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ URL::to('delete_post/'.$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                      <a href="{{ URL::to('view_post/'.$item->id) }}" class="btn btn-success">View</a>
                    </td>
                    
                  </tr> 
                  @endforeach
                  
                  
                </tbody>
              </table>
        </div>
    </div>
  </div>

  @endsection