@extends('layouts.app')

@section('content')



<div class="container pt-3">
  <div class="card">
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
          <div class="pt-3 pl-3 pb-3" style="background-color:#56b03f32"> 
            <h4>Bearbeite deinen deine Daten</h4>
           </div>
           <div class=" pl-3 pt-3 pr-3">
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
          </div>
          <div class=" pl-3 pt-3 pr-3">
            {{Form::text('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
          </div>

          <div class="row pl-3 pt-3" style="margin-right: 400px;margin-top:px">
            <div class="col">
                <input type="checkbox" id="a1" name="monday">
                <label for="sasquatch">Montag</label>
            </div>
              <div class="col-10">
                <input type="checkbox" id="a2" name="friday">
                <label for="sasquatch">Freitag</label>
              </div>
            </div>  
      
              <div class="row pl-3"style="margin-right: 400px;margin-top:px">
                <div class="col">
                <input type="checkbox" id="a3" name="tuesday">
                <label for="sasquatch">Dienstag</label>
              </div>
              <div class="col-10">
                <input type="checkbox" id="a4" name="saturday">
                <label for="sasquatch">Samstag</label>
              </div>
            </div>
      
            <div class="row pl-3"style="margin-right: 400px;margin-top:px">
              <div class="col">
                <input type="checkbox" id="a5" name="wednesday">
                <label for="sasquatch">Mittwoch</label>
              </div>
              <div class="col-10">
                <input type="checkbox" id="a6" name="sunday">
                <label for="sasquatch">Sonntag</label>
              </div>
           </div>
      
            <div class="row pl-3">
              <div class="col">
                <input type="checkbox" id="a7" name="thursday">
                <label for="sasquatch">Donnerstag</label>
              </div>
            </div>
          
          <!-- Time-->
          <div class="row pl-3"style="margin-bottom: 20px;margin-top: 20px">  
              
              <div class=""style="margin-left: 15px;margin-top: 5px; margin-right: 15px">
                <p>von</p>
              </div> 
      
              <input type="time" id="appt" name="timefrom" style="height:40px"
               min="00:00" max="24:00">  
              
              <div class=""style="margin-left: 15px;margin-top: 5px; margin-right: 15px">
              <p>bis</p>
              </div>
      
      
             <input type="time" id="appt" name="timeto"  style="height:40px"
              min="00:00" max="24:00">
      
             <div class=""style="margin-left: 15px;margin-top:5px; margin-right: 15px">
                  <p>Uhr</p>
              </div> 
        </div>
        
        {{Form::hidden('_method','PUT')}}
        <div class="pl-3 pb-3">
        {{Form::submit('Submit', ['class'=>'btn'])}}
      </div>
    {!! Form::close() !!}
    </div>   
  </div> 
@endsection