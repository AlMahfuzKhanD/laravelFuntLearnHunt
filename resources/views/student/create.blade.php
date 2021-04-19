@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                
                <a href="{{ url('student') }}" class="btn btn-info">All Student</a>
            
            <hr><br>
            <h3>Student Insert</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif

            <form action="{{ url('student') }}" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Student Name</label>
                        <input class="form-control"  type="text" name="name" placeholder="Student Name" >
                        
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Student email</label>
                        <input class="form-control" name="email" type="email" placeholder="Student Email" >
                        
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Student Phone</label>
                        <input class="form-control" name="phone" type="number" placeholder="Student Phone" >
                        
                    </div>
                </div>

                
                
                
                <br />
               
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
  </div>

  @endsection