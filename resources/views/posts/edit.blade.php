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
          <div class=" pl-3 pb-3 pt-3 pr-3">
            {{Form::text('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
          </div>

          <div class="pt-3 pl-3 pb-3"style="background-color:#56b03f32">  
            <h4>Wähle Tag und Zeit an dem der Stream zu sehen sein soll</h4>
           </div>
      
     
       <fieldset id="tage">
          <div class="row pl-3" style="margin-right: 400px;margin-top:px">
         
            <div class="col">
              @if ($post->monday==0)
                <input type="checkbox" name="monday">
              @else
                <input type="checkbox" name="monday" checked> 
              @endif  
                <label for="sasquatch">Montag</label>
            </div>
              <div class="col-10">
                @if ($post->friday==0)
                <input type="checkbox" name="friday">
              @else
                <input type="checkbox" name="friday" checked> 
              @endif  
                <label for="sasquatch">Freitag</label>
              </div>
            </div>  
      
              <div class="row pl-3"style="margin-right: 400px;margin-top:px">
                <div class="col">
                  @if ($post->tuesday==0)
                  <input type="checkbox" name="tuesday">
                @else
                  <input type="checkbox" name="tuesday" checked> 
                @endif  
                <label for="sasquatch">Dienstag</label>
              </div>
      
      
              <div class="col-10">
                @if ($post->saturday==0)
                <input type="checkbox" name="saturday">
              @else
                <input type="checkbox" name="saturday" checked> 
              @endif  
                <label for="sasquatch">Samstag</label>
              </div>
            </div>
      
            <div class="row pl-3"style="margin-right: 400px">
              <div class="col">
                @if ($post->wednesday==0)
                <input type="checkbox" name="wednesday">
              @else
                <input type="checkbox" name="wednesday" checked> 
              @endif  
                <label for="sasquatch">Mittwoch</label>
              </div>
      
              <div class="col-10">
                @if ($post->sunday==0)
                <input type="checkbox" name="sunday">
              @else
                <input type="checkbox" name="sunday" checked> 
              @endif  
                <label for="sasquatch">Sonntag</label>
              </div>
            </div>
      
            <div class="row pl-3" style="margin-right: 300px">
              <div class="col">
                @if ($post->thursday==0)
                <input type="checkbox" name="thursday">
              @else
                <input type="checkbox" name="thursday" checked> 
              @endif  
                <label for="sasquatch">Donnerstag</label>
              </div>
          </div>  
        </fieldset>
      
      
              <div class="" style="">
                <div class="col">
              @if ($post->immer==0)
                  <input value="{{$post->immer}}" type="checkbox" id="checkme"  name="immer" onclick="checkboxme()">
              @else
              <input value="{{$post->immer}}" type="checkbox" id="checkme"  name="immer" onclick="checkboxme()" checked>
              @endif    
                  <label style="font-weight:bold" for="sasquatch">Jeden Tag</label>
                </div>
              </div>
            
      
            
           
      
              @php
             // $timeto = str_replace(".", ":",$post->timeto);
              //$timefrom = str_replace(".", ":",$post->timefrom);
              
               @endphp
            
         
          <!-- Time-->
          <div class="row pl-3"style="margin-bottom: 20px;margin-top: 20px">  
      
              
              <div class=""style="margin-left: 15px;margin-top: 5px; margin-right: 15px">
                <p>von</p>
              </div> 
      
              <input type="time" id="" name="timefrom" value="{{ old('timefrom', $post->timefrom) }}" style="height:30px"
              min="0" max="24">  
              
              <div class=""style="margin-left: 15px;margin-top: 2px; margin-right: 15px">
              <p>bis</p>
              </div>
                
             <input type="time" id="" name="timeto" value="{{ old('timeto', $post->timeto) }}" style="height:30px"
               min="0" max="24">
      
             <div class=""style="margin-left: 15px;margin-top:2px; margin-right: 15px">
                  <p>Uhr</p>
              </div> 
        </div>
      
        <div class="form-group " >
          <label class="pl-3" for="image">Bild</label>
          <input type="file" name="image">
        </div>
        
        {{Form::hidden('_method','PUT')}}
        <div class="pl-3 pb-3">
        {{Form::submit('Submit', ['class'=>'btn'])}}
      </div>
    {!! Form::close() !!}
    </div>   
  </div> 

  <script>
window.onload = function () { 
    if ( "<?php echo $post->immer ?>" != "0"){
      var checkBox = document.getElementById("checkme");
    
        if (checkBox.checked == true){
        document.getElementById('tage').setAttribute('disabled','disabled');
      } else {
        document.getElementById('tage').removeAttribute('disabled');
      }
    }
}
    function checkboxme() { 
      var checkBox = document.getElementById("checkme");
    
        if (checkBox.checked == true){
        document.getElementById('tage').setAttribute('disabled','disabled');
      } else {
        document.getElementById('tage').removeAttribute('disabled');
      }
    }
    
    </script>
@endsection