

    

@extends('layouts.app')

@section('content')
  <!-- 

<section class="jumbotron text-center" style="background: url(/png/header.jpg);";>
  <div class="container">
    <h1 class="jumbotron-heading text-white" style="right: auto; float:none left; font-weight: 900;left:px;text-align: left; position: relative;font-family: &quot;Palatino Linotype&quot;">FamilyShare</h1>
    <p class="lead text-white" style="float:none left; font-weight: 500;left:px; position: relative; text-align: left; relative;font-family: &quot;Palatino Linotype&quot;">Deine persöhliche IP Cam sharing Platform. <br />Optimiert um einfach bedient werden zu können</p>
   
  </div>
</section>

  <div class="container marketing text-center ">

    
    <div class="row">
      <div class="col-lg-4">
        <img class="rounded-circle" style="margin-bottom: 20px" src="/png/feature-0.png" alt="Generic placeholder image" width="110" height="110">
        <h2>Live Streaming</h2>
        <p>Keep an eye on with what you care about at any time from anywhere; just like a security camera.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img class="rounded-circle" style="margin-bottom: 20px" src="/png/feature-2.png" alt="Generic placeholder image" width="110" height="110">
        <h2>Simple</h2>
        <p>Angepasst für jedes Gerät, ob Handy, Tablet oder Laptop. Durch usnere Dynamischen Elemente könnten sie uns überall genießen.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img class="rounded-circle" style="margin-bottom: 20px" src="/png/secure.png" alt="Generic placeholder image" width="110" height="110">
        <h2>Secure</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>


   

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" src="/png/figur.png" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="featurette-image img-fluid mx-auto" src="/png/test.png" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
      </div>
    </div>-->
    <style>

      html,
      body,
      header,
      .view {
        height: 100%;
      }
    
    </style>
    
    <!-- Main navigation -->
   
    
      <!-- Full Page Intro -->
      <div class="view deep-purple darken-3"style="margin-top:-100px;">
        <!-- Mask & flexbox options-->
        <div class="mask">
          <!-- Content -->
          <div class="container h-100">
            <!--Grid row-->
            <div class="row align-items-center h-100">
              <!--Grid column-->
              <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                <h1 class="white-text mb-4">Streaming for your Family</h1>
                <h4 class="mb-4 pb-2 white-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam vitae, culpa qui officia deserunt labor debitis.</h4>
                <a href="#test1"><button type="button" class="btn btn-outline-info waves-effect btn-md ml-md-0">Get started</button></a>
                <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-success btn-md">Register</button></a>
              </div>
              <!--Grid column-->
           
              <!--Grid column-->
              <div class="col-md-6 wow fadeInRight" data-wow-delay="0.2s">
                <img src="/png/mainpic.png" alt="" class="img-fluid">
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </div>
          <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
      </div>
      <!-- Full Page Intro -->
      
      <div class="container marketing text-center" id="test1">

        <section>
          
          <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">offer</h6>
          <h3 class="font-weight-bold text-center dark-grey-text pb-2">What we offer</h3>
          <hr class="w-header my-4">
          
        <div class="row align-items-center h-50" style="margin-top: 70px">
          <div class="col-lg-4">
            <img class="rounded-circle" style="margin-bottom: 20px" src="/png/feature-0.png" alt="Generic placeholder image" width="110" height="110">
            <h2>Live Streaming</h2>
            <p>Keep an eye on with what you care about at any time from anywhere; just like a security camera.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" style="margin-bottom: 20px" src="/png/feature-2.png" alt="Generic placeholder image" width="110" height="110">
            <h2>Simple</h2>
            <p>Angepasst für jedes Gerät, ob Handy, Tablet oder Laptop. Durch usnere Dynamischen Elemente könnten sie uns überall genießen.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" style="margin-bottom: 20px" src="/png/secure.png" alt="Generic placeholder image" width="110" height="110">
            <h2>Secure</h2>
            <p>Donec sed odio dui. Cras justo odsus commmentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
        
        </div>
      </section>
        <div class="container z-depth-1 my-5 p-5">

          <!-- Section -->
          <section>
        
            <h6 class="font-weight-bold text-center grey-text text-uppercase small mb-4">Services</h6>
            <h3 class="font-weight-bold text-center dark-grey-text pb-2">Our Services</h3>
            <hr class="w-header my-4">
            <p class="lead text-center text-muted pt-2 mb-5">Join thousands of satisfied customers using our template
              globally.</p>
        
            <div class="row d-flex justify-content-center">
        
              <div class="col-md-6 col-xl-4">
                <h5 class="font-weight-normal"><a class="dark-grey-text" href="#">Instalation</a></h5>
                <p class="small grey-text">Responsive, Minimalism</p>
              </div>
        
              <div class="col-md-6">
                <p class="text-muted mb-5 pb-2">So delightful up dissimilar by unreserved it connection frequently. Do an high room so in paid. Up on
                  cousin ye dinner should in. Sex stood tried walls manor truth shy and three his. Their to years so child
                  truth. Honoured peculiar families sensible up likewise by on in.</p>
              </div>
        
        
              <div class="col-md-6 col-xl-4">
                <h5 class="font-weight-normal"><a class="dark-grey-text" href="#">24/7 service</a></h5>
                <p class="small grey-text">PHP, MySQL, Laravel</p>
              </div>
        
              <div class="col-md-6">
                <p class="text-muted mb-5 pb-2">So delightful up dissimilar by unreserved it connection frequently. Do an high room so in paid. Up on
                  cousin ye dinner should in. Sex stood tried walls manor truth shy and three his. Their to years so child
                  truth. Honoured peculiar families sensible up likewise by on in.</p>
              </div>
        
        
              <div class="col-md-6 col-xl-4">
                <h5 class="font-weight-normal"><a class="dark-grey-text" href="#">Mobile App</a></h5>
                <p class="small grey-text">Andriod, iOS</p>
              </div>
        
              <div class="col-md-6">
                <p class="text-muted mb-5 pb-2">So delightful up dissimilar by unreserved it connection frequently. Do an high room so in paid. Up on
                  cousin ye dinner should in. Sex stood tried walls manor truth shy and three his. Their to years so child
                  truth. Honoured peculiar families sensible up likewise by on in.</p>
              </div>
        
            </div>
        
          </section>
          <!-- Section -->
        
        </div>
       
    
@endsection
