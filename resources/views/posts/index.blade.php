
@extends('layouts.app')

@section('content')
<!-- Grid row -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<div class="container pt-3">
  <div id="autotime" class="text-right pb-3">18:00:00</div>
    <div class="card"style="margin-bottom: 70px;">
      <div class="pt-3 pl-3 pb-3"style="">
      <h4><li style="color:black">klick <a href="/posts/create" class="btn btn-outline-primary btn-rounded btn-md ml-2 mr-2">hier</a> um eine neue Kamera hinzuzufügen. Schauen sie <a href="/#tutorial">hier</a> unser Tutorial <a href="/#tutorial">Video</a></h4>
      
      <h4><li style="color:black">Tipp: Um den Stream zu starten klicke auf eins der Videos.</h4>
      </div>
    </div>
      <div class="row text-center">

  @forelse($posts as $post)
  <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4"> <!-- mb = margin bottom-->
            <h4>Titel: {{$post->title}}</h4>
            @if ($post->timefrom == '00:00:00' && $post->timeto == '00:00:00')
            <h4>Ganztätig verfügbar</h4>
            @else 
            <h4>Verfügbar von {{$post->timefrom}} bis {{$post->timeto}}</h4>
            @endif
  <!--Modal: Name-->
  
  <?php
  date_default_timezone_set('Europe/Berlin');
  $timenow = date('H:i:s');
 
  $timefrom = $post->timefrom;
  $timeto = $post->timeto;
  ?>
 
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
                    <a><img style="width:100%" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/img/küche.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 2)  
                    <a><img style="width:100%" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/wohnzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 3)  
                    <a><img style="width:100%" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/schlafzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 4)  
                    <a><img style="width:100%" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/garten.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->image ==="noimage.jpg")
                      <a><img onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>  
                    @else
                        <a><img style="width:100%" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/uploads/{{$post->image}}" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @endif
            @else   
                    @if ($post->ort === 1) 
                    <a><img style="width:100%; opacity: 0.5" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/img/küche.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 2)  
                    <a><img style="width:100%; opacity: 0.5" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/wohnzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 3)  
                    <a><img style="width:100%; opacity: 0.5" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/schlafzimmer.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->ort === 4)  
                    <a><img style="width:100%; opacity: 0.5" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/garten.jpg" alt="video"
                      data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @elseif ($post->image ==="noimage.jpg")
                      <a><img style="opacity: 0.5" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>  
                    @else
                        <a><img style="width:100% opacity: 0.5" onclick="timer({{ $post->id }}, '{{ $timefrom }}', '{{ $timeto }}')" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/uploads/{{$post->image}}" alt="video"
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
  @empty 
  <div class=""style="margin-left: 14px; background-color:rgba(43, 255, 6, 0.116)">
     <h4> Momentan hast du keine Videos</h4>
  </div>
</div>
  @endforelse
  

  <script>  


 $(document).ready(function() {
   setInterval(function(){
     var time = new Date();
     var timehms = time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
     $("#autotime").text(timehms);
   },1000);
  });
  

 function msToTime(s) {
         if (s > 0) {
         var ms = s % 1000;
         s = (s - ms) / 1000;
         var secs = s % 60;
         s = (s - secs) / 60;
         var mins = s % 60;
         var hrs = (s - mins) / 60;

         return hrs + ' Stunde und ' + mins + ' minuten';
         }
        else
         {
          return "wait"
         }
     }
      // refresh now time every 5 seconds
      

  function timer (postid, timefrom, timeto) {
      if (timefrom == '00:00:00' && timeto == '00:00:00'){
        
        
        }
      else{    
      var time = new Date();
      var timehms = time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();

      let timenow = "<?php echo $timenow = date('H:i:s'); ?>";

      let from = new Date(Date.parse("2020/3/27 " + timefrom));
      let to = new Date(Date.parse("2020/3/27 " + timeto));
      let now = new Date(Date.parse("2020/3/27 " + timehms));
      
      let timediffinmilisec = to - now; //- 3600000
      
        
     
       
              if (from <= now && now <= to) {
              var close = function() {
                 $("#modal-" + postid).modal("hide");
              }
              setTimeout(close, timediffinmilisec);
              alert("Stream schließt sich in " + msToTime(timediffinmilisec));
              } 
              else 
              {
              document.getElementById(postid).removeAttribute("data-toggle");
              alert("Stream startet um " + timefrom);
              }
      }
      };
</script>
  
@endsection