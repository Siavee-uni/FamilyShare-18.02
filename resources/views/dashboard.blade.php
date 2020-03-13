@extends('layouts.app')

@section('content')

<div class="container pt-3" style="" >
    <div class="card" >
        <div class=""style="margin-bottom: 20px;">
            <div class="pt-3 pl-3 pb-3" style="background-color:#56b03f32"> 
                <h2>Alle deine Videos im überblick</h2>
               
           </div>
            <div class="pt-4"style="margin-left:10px;">
                <a href="/posts/create" class="btn">Neue kamera</a>
                
            </div>
        </div>
         
        @if(empty($posts))
        <div class=""style="margin-bottom:">
            <p>You have no cameras</p>
        </div>         
            @else
            
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                              <th scope="col"><h5 class="pl-3">#</h5>  </th>
                              <th scope="col"><h5 class="">Status:</h5></th>
                              <th scope="col"><h5 class="">Anfragen</h5></th>
                              <th scope="col"><h5 class="pl-3">#</h5></th>
                              <th scope="col"><h5 class="pl-3">Ort</h5></th>
                              <th scope="col"><h5 class="pl-3">#</h5></th>
                              <th scope="col"><h5 class="pl-3">#</h5></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td><img style="width:40%" class="" src="/png/videoplayer.jpg">
                                    </td>
                                    <td>
                                        @if ($post->online === 1)<img style="height:20px" class="" src="/png/online.png">
                                        @else  <img style="height:20px" class="" src="/png/offline.png">
                                        @endif
                                    </td>
                                    <td>@if ($post->anfrage === 0) <h4>keine</h4>
                                        @else <h4 style="color:green">vorhanden</h4>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->online === 0)
                                        {!! Form::open(['action' => ['PostsController@online', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                           
                                            <input name="online" value="1" type='hidden'>
                                            <button type="submit" class="btn-outline-primary">Stream aktivieren</button> <br> <br>
                                        
                                        {!! Form::close() !!}

                                        @else
                                        {!! Form::open(['action' => ['PostsController@online', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <input name="online" value="0" type='hidden'>
                                        <button type="submit" class="btn-outline-primary">Stream deaktivieren</button> </td>
                                        {!! Form::close() !!}
                                        @endif
                                    <td> <div style="margin-top: 5px"><h4>{{$post->title}}</h4></div></td>
                                    
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary btn-rounded btn-md ml-4">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
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
