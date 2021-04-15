@extends('master')


@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
                <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
                <a href="" class="btn btn-info">All Category</a>
            
            <hr>
            <form id="contactForm" name="sentMessage" novalidate>
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
                        <select name="category_id" class="form-control" id="">
                            <option value="">option 1</option>
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