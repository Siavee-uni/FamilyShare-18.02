@extends('layouts.app')

@section('content')

<div class="container pt-3" style="" >
    <div class="card" >
        <div class=""style="margin-bottom: 20px;">
            <div class="pt-3 pl-3 pb-3" style="background-color:#aeb3af24"> 
                <h2>Alle deine Kameras im überblick</h2>
               
           </div>
           <div class="pt-4 "style="margin-left:10px;">
            <h4><a href="/posts/create" class="w3-button w3-circle w3-teal" style="background-color:rgba(86, 176, 63, 0.692);">+</a>   neue Kamera</h4>   
            
                    
                
           </div>
        </div>
         
        @if(empty($posts))
        <div class=""style="margin-bottom: ">
            <p>You have no cameras</p>
        </div>         
            @else
            
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                              <th scope="col"><h5 class="">Video</h5>  </th>
                              <th scope="col"><h5 class="">Status:</h5></th>
                              <th scope="col"><h5 class="text-center">Anfragen</h5></th>
                              <th scope="col"><h5 class="text-center">#</h5></th>
                              <th scope="col"><h5 class="">Ort</h5></th>
                              <th scope="col"><h5 class="text-center">#</h5></th>
                              <th scope="col"><h5 class="text-center">#</h5></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($posts as $post)
                                <tr> 
                                    <td>    @if($post->image ==="noimage.jpg")
                                                <img style=" width:30%" class="" src="/png/videoplayer.jpg">
                                            @else  <img style="width:30%; height:57px" class="" src="./storage/uploads/{{$post->image}}">  
                                            @endif
                                    </td>
                                    <td>
                                        @if ($post->online === 1)<div class="text-center"><img style="height:20px" class="" src="/png/online.png"></div>
                                        @else  <div class="text-center"><img style="height:20px" class="" src="/png/offline.png"></div>
                                        @endif
                                    </td>
                                    <td>@if ($post->anfrage === 0) <h4 class="text-center">keine</h4>
                                        @else <h4 class="text-center" style="color:green">vorhanden</h4>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->online === 0)
                                        {!! Form::open(['action' => ['PostsController@online', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="text-center">
                                            <input name="online" value="1" type='hidden'>
                                            <button type="submit" class="btn btn-2 btn-sep">Stream aktivieren</button> <br> <br>
                                        </div>
                                        {!! Form::close() !!}

                                        @else
                                        {!! Form::open(['action' => ['PostsController@online', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <input name="online" value="0" type='hidden'>
                                        <button type="submit" style="background-color:red" class="btn btn-3 btn-sep">Stream deaktivieren</button> </td>
                                        {!! Form::close() !!}
                                        @endif
                                    <td> <div style="margin-top: 5px"><h4>{{$post->title}}</h4></div></td>
                                    
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary btn-rounded btn-md ml-4">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Löschen', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                            @endif
            
                        </div>
</div>
  
@endsection
