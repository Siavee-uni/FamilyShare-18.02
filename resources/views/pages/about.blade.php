@extends('layouts.app')

@section('content')

<div class="image-aboutus-banner"style="margin-top:70px">
    <div class="container">
        
     <div class="row">
         <div class="col-md-12">
          <h1 class="lg-text">About Us</h1>
          <p class="image-aboutus-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
     </div>
 </div>
 </div>
 
 <div class="container paddingTB60">
     <div class="row">
 
             <!-- Blog Post Content Column -->
             <div class="col-lg-8">
 
                  <hr>
 
                 <h2>Simple streaming and in-build powerful standards</h2>
 
                 <hr>
 
                 <!-- Preview Image -->
                 <img class="img-responsive" src="http://mobilebusinessinsights.com/wp-content/uploads/2016/03/IBM_MobileFirst_SXSWBlog_0321_v2.jpg" alt="">
 
                 <hr>
 
                 <!-- Post Content -->
                 <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
             </div>
       </div>
 </div>
   
   
 <div class="cta-sektion cta-padding35">
     <div class="container">
         <div class="row">
             <div class="col-md-9 col-sm-9 col-xs-12">
                 <h3><span class="glyphicon glyphicon-cog "></span> <b>FamilyShare</b> Explore properties like a pro.</h3>
             </div>
             <div class="col-md-3 col-sm-3 col-xs-12 Tpadding10">
                 <a class="btn btn-primary" href="{{ route('register') }}" role="button">Start Right Now</a>
             </div>
         </div>
     </div>
 </div>
 
  
@endsection
