@extends('layouts.app')

@section('content')

<div class="container pt-3">
  <div class="card">
    <div class="pt-3 pl-3 pb-3" style="background-color:#56b03f32"> 
        
         <h4>Füge hier einen Titel und den Streaminglink zur Ip-Cam hinzu</h4>
        
    </div>

    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    @csrf
        <div class="form-group pl-3 pt-3 pr-3">
            
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group pl-3 pr-3">
           
            {{Form::text('body', '', ['class' => 'form-control', 'placeholder' => 'Video Link like this http://131.173.8.23:80/mjpg/video.mjpg'])}}
        </div>

        

      
    <div class="pt-3 pl-3 pb-3"style="background-color:#56b03f32">  
      <h4>Wähle Tag und Zeit an dem der Stream zu sehen sein soll</h4>
     </div>


 <fieldset id="tage">
    <div class="row pl-3" style="margin-right: 400px;margin-top:px">
    
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
      

      
     

      
      
    
    <!-- Time-->
    <div class="row pl-3"style="margin-bottom: 20px;margin-top: 20px">  
        
        <div class=""style="margin-left: 15px;margin-top: 5px; margin-right: 15px">
          <p>von</p>
        </div> 

        <input type="time" id="" name="timefrom" style="height:30px"
         min="00:00" max="24:00">  
        
        <div class=""style="margin-left: 15px;margin-top: 2px; margin-right: 15px">
        <p>bis</p>
        </div>


       <input type="time" id="" name="timeto"  style="height:30px"
        min="00:00" max="24:00">

       <div class=""style="margin-left: 15px;margin-top:2px; margin-right: 15px">
            <p>Uhr</p>
        </div> 
  </div>
        <div class="pl-3 pb-3">
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
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