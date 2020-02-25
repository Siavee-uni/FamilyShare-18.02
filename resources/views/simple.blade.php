


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
