@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ route('write.post') }}" class="btn btn-danger">Add Post</a>
                <a href="" class="btn btn-info">All Category</a>
            
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif

            <form action="{{ route('store.category') }}" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Category Name</label>
                        <input class="form-control"  type="text" name="name" placeholder="Category Name" >
                        
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Slug Name</label>
                        <input class="form-control" name="slug" type="text" placeholder="Slug Name" >
                        
                    </div>
                </div>

                
                
                
                <br />
                <div id="success"></div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
  </div>

  @endsection