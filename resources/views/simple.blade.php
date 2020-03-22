


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
  <title>FamilyShare</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> 
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

  <!-- Libraries CSS Files -->
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/style.css" rel="stylesheet">
   

</head>
<body>


<!-- Grid row -->

<div class="container pt-4">
  <div class="card"style="margin-bottom: 70px;">
    <div class="text-center"style="margin-bottom: 10px;margin-top: 10px;margin-left: 10px;">
    <h2>Um den Stream zu starten klicke auf eins der Videos</h2>
    </div>
  </div>
      <div class="row text-center">
        @forelse($posts as $post)
        <!-- Grid column -->
              <div class="col-lg-6 col-md-12 mb-4"> <!-- mb = margin bottom-->
                  <h3>Ort: {{$post->title}}</h3>
                  @if (empty($post->timefrom))
                  <h3>keine Zeit festgelegt</h3>
                  @else 
                  <h3>Verfügbar von {{$post->timefrom}} bis {{$post->timeto}}</h3>
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
                                  <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
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
                        <a><img style="width:100%" onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="./storage/uploads/{{$post->image}}" alt="video"
                        data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
                    @endif
            @else   
                  <a><img onclick="test()" id="{{$post->id}}"class="z-depth-1 img-thumbnail" src="/png/videoplayer.jpg" alt="video"
                  data-toggle="modal" data-target="#modal-{{$post->id}}"></a>
           @endif
                
            <div class="row pt-2">
              <div class="col text-left">
                <div class="row">
                  <h4 class="pl-3">Status:</h4>
                  @if ($post->online === 1)
                  <h4 class="pl-2" style="color:green">Online</h4> <!--<img id="online" class="pl-2" style="height:15px" src="/png/online.png" alt="">-->
                  @else
                  <h4 class="pl-2"style="color:red">Offline</h4><!--<img id="offline" class="pl-2" style="height:15px " src="/png/offline.png" alt=""> -->
                  @endif
                </div>
            </div>
              <div class="col text-right">
                @if ($post->online === 0)
      
                    {!! Form::open(['action' => ['PostsController@anfrage', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <button class="green button" style="height: 25px;" type="submit">Stream freischalten</button>
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
  @empty 
  <div class=""style="margin-left: 14px">
     <h4> You have no posts at the moment. </h4>
    </div>
  @endforelse
  </div>
  <!-- JavaScript Libraries -->
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/superfish/hoverIntent.js"></script>
  <script src="/lib/superfish/superfish.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/modal-video/js/modal-video.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/js/main.js"></script>
  
</body>
</html>
