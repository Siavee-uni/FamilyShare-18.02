
@extends('layouts.app')

@section('content')
<!-- Grid row -->

<div class="container pt-3">
    <div class="card"style="margin-bottom: 70px;">
      <div class="pt-3 pl-3 pb-3"style="">
      <h4><li>klick <a href="/posts/create" class="btn btn-outline-primary btn-rounded btn-md ml-2 mr-2">hier</a> um eine neue Kamera hinzuzufügen.</h4>
      
      <h4><li>Um den Stream zu starten klicke auf eins der Videos.</h4>
      </div>
    </div>
      <div class="row text-center">

  @forelse($posts as $post)
  <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4"> <!-- mb = margin bottom-->
            <h4>Ort: {{$post->title}}</h4>
            @if (empty($post->timefrom))
            <h4>keine Zeit festgelegt</h4>
            @else 
            <h4>Verfügbar von {{$post->timefrom}} bis {{$post->timeto}}</h4>
            @endif
  <!--Modal: Name-->
          @php
          $timenow = date('H.m')+1;  
          @endphp
          @if ($post->online === 1)
                  <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document"><!-- modal-dialog ist für die größe zuständig/styling-->
                      <div class="modal-content">
                        <div class="modal-body mb-0 p-0" style="">
                            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                              <iframe class="embed-responsive-item" src="{{$post->body}}" allowfullscreen></iframe>
                            </div>
                          <div class="modal-footer justify-content-center">
                            <h4 id="modal-{{$post->id}}" class="mr-4">{{$post->title}}</h4>
                            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Schließen</button>
                          </div>
                        </div>
                     </div>
                    </div>
                   </div>
                   
                    @if ($post->ort === 1) 
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/img/küche.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 2)  
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/wohnzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 3)  
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/schlafzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 4)  
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/garten.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->image ==="noimage.jpg")
                      <a><img onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>  
                    @else
                        <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/uploads/{{$post->image}}" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @endif
            @else   
                    @if ($post->ort === 1) 
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/img/küche.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 2)  
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/wohnzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 3)  
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/schlafzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 4)  
                    <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/garten.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->image ==="noimage.jpg")
                      <a><img onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>  
                    @else
                        <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/uploads/{{$post->image}}" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @endif
           @endif
          
      <div class="row pt-2">
        <div class="col text-left">
          <div class="row">
            <h5 class="pl-3">Status:</h5>
            @if ($post->online === 1)
            <h5 class="pl-2"style="color:green">Online</h5> 
            @else
            <h5 class="pl-2"style="color:red">Offline</h5>
            @endif
          </div>
      </div>
        <div class="col text-right">
          @if ($post->online === 0)

              {!! Form::open(['action' => ['PostsController@anfrage', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              <button class="green button" style="height: 25px" type="submit">Stream freischalten</button>
              <input name="anfrage" value="1" style="visibility: hidden">
              {!! Form::close() !!}
        
          @elseif ($post->online === 0 && $post->anfrage === 1)
             <button class="" style="height: 25px" type="submit" disabled><h5>anfrage versendet</h5></button>
          @else
          @endif
        </div>
      </div>
  </div>
 
 
  <!-- Grid column -->

  <?php
 
  $timenow = date('H.m')+1;
 
  $timefrom = $post->timefrom;
  $timeto = $post->timeto;
  
  
 
 
  ?>
  <script>  
          setInterval("my_function();",1000); 
          
          function my_function() {
              $('#load').load('/posts');
              };


//  function test() {
//           var time = <?php echo $timenow ?>;
//           var timefrom = <?php echo $timefrom ?>; 
//           var timeto = <?php echo $timeto ?>; 
//           var timedif = <?php echo $timeto ?> - <?php echo $timenow ?>;
          

//           if (time >= timefrom && time <= timeto) {
//               var close = function() {
//                   $("#modal-{{$post->id}}").modal("hide");
//               }
//              setTimeout(close, timedif);
//              // var linka = document.getElementById("{{$post->id}}");
//              // linka.element.setAttribute("data-toggle");
//              } 
//              else 
//              {
//               document.getElementById("{{$post->id}}").removeAttribute("data-toggle");
//               alert("Sichbar um " + "<?php echo $timefrom ?>" + " Uhr");
//           }
//         }
  </script>

  @empty 
  <div class=""style="margin-left: 14px; background-color:rgba(43, 255, 6, 0.116)">
     <h4> Momentan hast du keine Videos</h4>
  </div>
</div>
  @endforelse
  
  
@endsection