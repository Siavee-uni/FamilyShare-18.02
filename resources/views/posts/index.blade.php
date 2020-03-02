
@extends('layouts.app')

@section('content')
<!-- Grid row -->

<div class="container pt-3">
    <div class="card"style="margin-bottom: 70px;">
      <div class="pt-3 pl-3 pb-3"style="">
      <h4>klick <a href="/posts/create" class="btn btn-outline-primary btn-rounded btn-md ml-2 mr-2">hier</a> um eine neue Kamera hinzuzufügen</h4>
      <h4>Um den Stream zu starten klicke auf eins der Videos</h4>
      </div>
    </div>
      <div class="row text-center">
  @forelse($posts as $post)
  <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4"> <!-- mb = margin bottom-->
            <h4>Stream: {{$post->title}}</h4>
            <h4>Verfügbar von {{$post->timefrom}} bis {{$post->timeto}}</h4>
  <!--Modal: Name-->
          <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document"><!-- modal-dialog ist für die größe zuständig/styling-->
  
  <!--Content-->
              <div class="modal-content">
  
  <!--Body-->
                <div class="modal-body mb-0 p-0" style="">
  
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                      <iframe class="embed-responsive-item" src="{{$post->body}}" allowfullscreen></iframe>
                    </div>
  
                 
  
      <!--Footer-->
                  <div class="modal-footer justify-content-center">
                    <h4 id="modal-{{$post->id}}" class="mr-4">{{$post->title}}</h4>
                    <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                  </div>
                </div>
            </div>
  <!--/.Content-->
          </div>
  </div>
  <!--Modal: Name-->
  
  <a><img onclick="myFunction()" id="datapic"class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
  data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
  
  </div>
  <!-- Grid column -->
  <?php

  $date = date("Y-m-d");

  ?>
  <script>

    function myFunction() {
         var test = "{{$post->title}}"; 
         var test2 = "{{ $post->timeto }}"; 
         
          // varbialen aus der datenbank.
          var date = "<?php echo $date?>";
          
         // daten aus der datenbank
          const ts = date + " 20:00:00"; 
          const startDate = new Date(ts);
    
          const te = date + " 22:05:00"; 
          const endDate = new Date(te);
          // akuelle datum
          var nowDate = new Date();
    
          // gib alle daten aus zum testen
          alert("start datum = " + test  + " end datum = " + test2 + "time now =" + nowDate);
          
          // übrige Zeit zum schauen des videos
          var date_diff = endDate - nowDate;
    
        
          // schaue ob aktuelle zeit im timslot liegt
          if (nowDate >= startDate && nowDate < endDate) {
              var close = function() {
                  $("#modal-{{$post->id}}").modal("hide");
              }
              alert(""+ date_diff + " bis zum schließen");
              setTimeout(close, date_diff);
              document.getElementById("datapic").addAttribute("data-toggle");
             
    
          } else {
    
    
              document.getElementById("datapic").removeAttribute("data-toggle");
              alert("opens in " + timestarts + " seconds");
          }
        }
        
      </script>

  @empty 
  <div class=""style="margin-left: 14px; background-color:rgba(43, 255, 6, 0.116)">
     <h4> Momentan hast du keine Videos</h4>
  </div>

  @endforelse
  </div>
  
@endsection