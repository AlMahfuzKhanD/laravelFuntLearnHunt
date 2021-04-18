@extends('master')


@section('content')
    


    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
          @foreach ($post as $item)
          <div class="post-preview">
          <a href="{{ URL::to('view_post/'.$item->id) }}">
            <h2 class="post-title">
              {{ $item->title }}
            </h2>
            <img src="{{ url($item->image) }}" alt="no image" style="height: 300px;">
          </a>
          <p class="post-meta">Category
            <a href="#">{{ $item->name }}</a>
            on Slug {{ $item->slug }}</p>
        </div>
        
          @endforeach

          
          

        

        <!-- Pager -->
        <div class="clearfix">
          {{ $post->links() }}
        </div>
      </div>
    </div>
 

  <hr>

  @endsection