@extends('layouts.app')

@section('content')
<div class="container card">
<div class="row "style="margin-left:0px ;margin-top: 20px"> 
<h1>New camera</h1>
</div>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('body', 'Video Link')}}
            {{Form::text('body', '', ['class' => 'form-control', 'placeholder' => 'Video Link like this http://131.173.8.23:80/mjpg/video.mjpg'])}}
        </div>

        <h3>Rules: stream is reachable on</h3>

       <!-- TimeBasedRules new extension-->
    <div class="row "style="margin-bottom: 20px;margin-top: 20px">  
        <div class="form-check col-md-1">
            {{Form::checkbox('monday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            Mo
            </label>
          </div>

          <div class="form-check col-md-1">
            {{Form::checkbox('tuesday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            Tu 
            </label>
          </div>
          
          <div class="form-check col-md-1">
            {{Form::checkbox('wednesday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            We
            </label>
          </div>
          <div class="form-check col-md-1">
            {{Form::checkbox('thursday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            Th
            </label>
          </div>
          <div class="form-check col-md-1">
            {{Form::checkbox('friday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            Fr
            </label>
          </div>
          <div class="form-check col-md-1">
            {{Form::checkbox('saturday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            Sa
            </label>
          </div>
          <div class="form-check col-md-1">
            {{Form::checkbox('sunday', 'value')}}
            <label class="form-check-label" for="defaultCheck1">
            Su
            </label>
          </div>
    </div>
    <!-- Time-->
    <div class="row"style="margin-bottom: 20px;margin-top: 20px">    
        <div class=""style="margin-left: 15px">
          <p>from</p>
        </div> 
          <div class="col-md-1 ">
            {{Form::selectRange('numberfrom', 0, 24)}}
          </div>    
    
        <div class=""style="margin-left: -20px">  
        <p>to</p>
        </div>
        <div class="col-md-1">
          {{Form::selectRange('numberto', 0, 24)}}
        </div>   
        <div class=""style="margin-left: -20px">  
            <p>Uhr</p>
            </div> 
  </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
</div>
@endsection