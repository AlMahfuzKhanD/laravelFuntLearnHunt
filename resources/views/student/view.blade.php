@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ url('student/create') }}" class="btn btn-danger">Add Student</a>
                <a href="{{ url('student') }}" class="btn btn-info">All Student</a>
                
            
            <br><br>

                <div>
                    <h2>{{ $student->name }}</h2>
                    <p>{{ $student->email }}</p>
                    
                    <p>{{ $student->phone }}</p>
               </div> 

           
        </div>
    </div>
  </div>

  @endsection