@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-12  mx-auto">
            
                
                <a href="{{ url('student') }}" class="btn btn-info">Add Student</a>
            
            <br><br>

            

            <table class="table">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Phone</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($student as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                      <a href="{{ URL::to('edit_student/'.$item->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ URL::to('delete_student/'.$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                      <a href="{{ URL::to('view_student/'.$item->id) }}" class="btn btn-success">View</a>
                    </td>
                    
                  </tr> 
                  @endforeach
                  
                  
                </tbody>
              </table>
        </div>
    </div>
  </div>

  @endsection