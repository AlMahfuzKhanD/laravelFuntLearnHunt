@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ route('write.post') }}" class="btn btn-danger">Add Post</a>
                
            
            <br><br>

                <div>
                    <h2>{{ $post->title }}</h2>
                    <h3>{{ $post->name }}</h3>
                    <img src="{{ url($post->image) }}" alt="" style="height: 500px; width:300px;">
                    <p>{{ $post->details }}</p>
               </div> 

           
        </div>
    </div>
  </div>

  @endsection