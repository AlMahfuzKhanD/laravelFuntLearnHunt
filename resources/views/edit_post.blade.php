@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
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
            <form action="{{ url('update_post/'.$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post Title</label>
                        <input class="form-control" name="title" type="text" value="{{ $post->title }}" >
                        
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Category</label>
                        <select name="category_id" class="form-control" name="category_id">
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $post->category_id)
                                selected
                            @endif>{{ $item->name }}</option>
                            @endforeach
                            
                        </select>
                        
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="form-group col-xs-12 ">
                        <label>Select Image</label>
                        <input class="form-control" name="image" type="file"><br><br> Old:image
                        <img src="{{ url($post->image) }}" alt="" style="height: 40%; width:30%; ">
                        <input type="hidden" name="old_image" value="{{ $post->image }}">
                        
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Post Details</label>
                        <textarea class="form-control" name="details" rows="5" >{{ $post->details }}</textarea>
                        
                    </div>
                </div>
                <br />
                <div id="success"></div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
  </div>

  @endsection