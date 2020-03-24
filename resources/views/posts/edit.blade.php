@extends('layouts.app')

@section('content')



<div class="container pt-3">
  <div class="card">
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
          <div class="pt-3 pl-3 pb-3" style="background-color:#56b03f32"> 
            <h4>Bearbeite hier deinen Daten</h4>
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
            

            
        <hr>
          <!-- Time-->
          <div class="row pl-3"style="margin-top: 20px">  
      
              
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
        <hr>
        <div class="row">
          <div class="col-sm">
            <div class="pt-3 pl-3 text-center"><h4>Küche</h4></div>
            <div class="pt-3 pl-3"><img style="width:100%; height: 150px" src="https://images.kueche-co.de/PIM/Kuechenbilder/Beton/image-thumb__79133__heroimage-medium/Beton~-~767w.jpeg" alt=""></div>
            <div class="pt-3 pl-3 text-center"><input type="checkbox" name="ort" value="1"></div>
          </div>
          <div class="col-sm">
            <div class="pt-3  text-center"><h4>Wohnzimmer</h4></div>
            <div class="pt-3 "><img style="width:100%; height: 150px" src="https://www.holzconnection.de/media/wysiwyg/landingpages/wohnzimmer/holzconnection-wohnzimmer-top-1.jpg" alt=""></div>
            <div class="pt-3  text-center"><input type="checkbox" name="ort"value="2"></div>
          </div>
          <div class="col-sm">
            <div class="pt-3  text-center"><h4>Schlafzimmer</h4></div>
            <div class="pt-3 "><img style="width:100%; height: 150px" src="https://d16hxxzh1eypty.cloudfront.net/large/s/schlafzimmer-mette-komplettset-landhausstil-kiefer-massiv-1557312080.jpg" alt=""></div>
            <div class="pt-3  text-center"><input type="checkbox" name="ort"value="3"></div>
          </div>
          <div class="col-sm">
            <div class="pt-3  pr-3 text-center"><h4>Garten</h4></div>
            <div class="pt-3  pr-3"><img style="width:100%; height: 150px" src="https://imgix.obi.de/magazinapi/dam/Gartengestaltung/Ideen-fuer-die-Gartengestaltung-5-Stile/Gartenstile-Titelbild-mediterraner-Garten.jpg?auto=format%2Ccompress&crop=focalpoint&fit=crop&fp-x=0.446&fp-y=0.36&fp-z=1&h=818&w=1440" alt=""></div>
            <div class="pt-3  pr-3 text-center"><input type="checkbox" name="ort" value="4"></div>
          </div>
        </div>
          
        <hr>
        
           <div class="form-group pt-3 pb-3" >
            <label class="pl-3" for="image"></label>
            <input  type="file" name="image">
          </div>
        
        <hr>
        
        {{Form::hidden('_method','PUT')}}
        <div class="pl-3 pb-3">
        {{Form::submit('Abschicken', ['class'=>'btn'])}}
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