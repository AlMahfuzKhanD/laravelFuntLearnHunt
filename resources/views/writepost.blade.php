@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
                <a href="{{ route('all.category') }}" class="btn btn-info">All Category</a>
                <a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>
            
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
            <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post Title</label>
                        <input class="form-control" name="title" type="text" placeholder="Post Title" >
                        
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Category</label>
                        <select name="category_id" class="form-control" name="category_id">
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            
                        </select>
                        
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Post Image</label>
                        <input class="form-control" name="image" type="file">
                        
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post Details</label>
                        <textarea class="form-control" name="details" rows="5" placeholder="Details" ></textarea>
                        
                    </div>
                </div>
                <br />
                <div id="success"></div>
                <button class="btn btn-primary" type="submit">Send</button>
            </form>
        </div>
    </div>
  </div>

  @endsection