


@extends('layouts.app')

@section('content')


<!-- Grid row -->

<div class="container pt-3">
   
      <div class="row text-center">
  @forelse($posts as $post)
  <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4">
            <h4>Stream: {{$post->title}}</h4>
  <!--Modal: Name-->
          <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
  
  <!--Content-->
              <div class="modal-content modal-xl">
  
  <!--Body-->
                <div class="modal-body mb-0 p-0">
  
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe class="embed-responsive-item" src="{{$post->body}}"
                      allowfullscreen></iframe>
                    </div>
  
                 </div>
  
  <!--Footer-->
  <div class="modal-footer justify-content-center">
  <h4 id="modal-{{$post->id}}" class="mr-4">{{$post->title}}</h4>
  <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
  </div>
  
  </div>
  <!--/.Content-->
  
  </div>
  </div>
  <!--Modal: Name-->
  
  <a><img class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
    data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
  
  </div>
  <!-- Grid column -->
  @empty 
  <div class=""style="margin-left: 14px">
     <h4> You have no posts at the moment. </h4>
    </div>
  @endforelse
  </div>
@endsection
