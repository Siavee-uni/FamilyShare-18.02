@extends('layouts.app')

@section('content')

<div class="container pt-3">
  <div class="card">
    <div class="pt-3 pl-3 pb-3" style="background-color:#56b03f32"> 
        
         <h4>Füge hier einen Titel und den streaming Link zur Kamera hinzu</h4>
        
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
        <div class="form-group pl-3 pt-3 pr-3">
            
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Tittel'])}}
        </div>

        <div class="form-group pl-3 pr-3">
           
            {{Form::text('body', '', ['class' => 'form-control', 'placeholder' => 'Streaming Link z.B http://131.173.8.23:80/mjpg/video.mjpg'])}}
        </div>

        

<!-- Tage -------------------------------------------------------------------------->      
    <div class="pt-3 pl-3 pb-3"style="background-color:#56b03f32">  
      <h4>Wähle Tag und Zeit an dem der Stream zu sehen sein soll</h4>
     </div>

 <fieldset id="tage">
    <div class="row pt-3 pl-3" style="margin-right: 400px">
    
      <div class="col">
          <input type="checkbox" id="a" name="monday">
          <label for="sasquatch">Montag</label>
      </div>
        <div class="col-10">
          <input type="checkbox" id="a" name="friday">
          <label for="sasquatch">Freitag</label>
        </div>
      </div>  

        <div class="row pl-3"style="margin-right: 400px;margin-top:px">
          <div class="col">
          <input type="checkbox" id="a" name="tuesday">
          <label for="sasquatch">Dienstag</label>
        </div>


        <div class="col-10">
          <input type="checkbox" id="a" name="saturday">
          <label for="sasquatch">Samstag</label>
        </div>
      </div>

      <div class="row pl-3"style="margin-right: 400px">
        <div class="col">
          <input type="checkbox" id="a" name="wednesday">
          <label for="sasquatch">Mittwoch</label>
        </div>

        <div class="col-10">
          <input type="checkbox" id="a" name="sunday">
          <label for="sasquatch">Sonntag</label>
        </div>
      </div>

      <div class="row pl-3" style="margin-right: 300px">
        <div class="col">
          <input type="checkbox" id="a" name="thursday">
          <label for="sasquatch">Donnerstag</label>
        </div>
    </div>  
  </fieldset>


        <div class="" style="">
          <div class="col">
            <input type="checkbox" id="checkme" name="immer" onclick="checkboxme()">
            <label style="font-weight:bold" for="sasquatch">Jeden Tag</label>
          </div>
        </div>
      
    
    <!-- Time------------------------------>
    <div class="row pl-3"style="margin-top: 20px">  
        
        <div class=""style="margin-left: 15px;margin-top: 2px; margin-right: 15px">
          <p>von</p>
        </div> 

        <input type="time" id="" name="timefrom" style="height:30px"
         min="0" max="24" placeholder="15:00:00">  
        
        <div class=""style="margin-left: 15px;margin-top: 2px; margin-right: 15px">
        <p>bis</p>
        </div>


       <input type="time" id="" name="timeto"  style="height:30px"
        min="0" max="24" placeholder="20:00:00">

       <div class=""style="margin-left: 15px;margin-top:2px; margin-right: 15px">
            <p>Uhr</p>
        </div> 
  </div>
<!-- Bild wählen----------------------------------------------------------->
  <div class="pt-3 pl-3 pb-3"style="background-color:#56b03f32">  
    <h4>Optional: Wähle einen Bereich für den Stream oder lade einen thumbnail hoch</h4>
  </div>

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

        <div class="pl-3 pb-3">
        {{Form::submit('Abschicken', ['class'=>'btn btn-primary'])}}
        </div>
      {!! Form::close() !!}
    </div>
  </div>  
<script>

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