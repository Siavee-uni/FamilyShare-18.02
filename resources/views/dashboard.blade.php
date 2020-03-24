@extends('layouts.app')

@section('content')

<div class="container pt-3" style="" >
    <div class="card" >
        <div class=""style="margin-bottom: 20px;">
            <div class="pt-3 pl-3 pb-3" style="background-color:"> 
                <h2>Alle deine Kameras im überblick</h2> <br>
                <h4>Link zum SimpleMode welcher die Vereinfachte Ansicht der Streams für Senioren hat</h4><a href=""><h4 style="color:green;text-transform: lowercase;">family-share.de/simple</h4></a> <br>
                <h5>Hinweis: Eine vorhandene Anfrage wird angezeigt sobald man bei einem Stream auf Freischalten klickt.</h5>
               
           </div>
           <hr>
           <div class="pl-3">
        <a href="/posts/create"><img class="imghover" style="height:50px" src="/img/svg/add.svg" alt=""></a>
            
    </div>       
                
         
        </div>
         
        @if(empty($posts))
        <div class=""style="margin-bottom: ">
            <p>You have no cameras</p>
        </div>         
            @else
            
                    <table class="table table-striped">
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
                                                <img style=" width:40%" class="" src="/png/videoplayer.jpg">
                                            @else  <img style="width:40%; height:80px" class="" src="./storage/uploads/{{$post->image}}">  
                                            @endif
                                    </td>
                                    <td>
                                        @if ($post->online === 1)
                                            <div class="text-center pt-4"><h4 style="color:green">online</h4><!--<img style="height:32px" class="" src="/png/green.png">--></div>
                                        @else  
                                            <div class="text-center pt-4"><h4 style="color:red">offline</h4><!--<img style="height:42px" class="" src="/png/Red.svg">--></div>
                                        @endif
                                    </td>
                                    <td
                                    >@if ($post->anfrage === 0) <!--<h4 class="text-center">keine</h4>-->
                                     @else 
                                        <div class="text-center pt-3"><img style="height:40px" class="" src="/png/message.svg"></div>
                                    @endif
                                    </td>
                                    <td>
                                        @if ($post->online === 0)
                                        {!! Form::open(['action' => ['PostsController@online', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="text-center">
                                            <input name="online" value="1" type='hidden'>
                                            <div class="pt-4"><button type="submit" class="green button">Stream aktivieren</button> <br> <br></div>
                                        </div>
                                        {!! Form::close() !!}

                                        @else
                                        {!! Form::open(['action' => ['PostsController@online', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <input name="online" value="0" type='hidden'>
                                        <div class="pt-4"><button type="submit" style="" class="red button">Stream deaktivieren</button> </td></div>
                                        {!! Form::close() !!}
                                        @endif
                                    <td> <div class="pt-4" style=""><h4>{{$post->title}}</h4></div></td>
                                    
                                    <td><div class="pt-4"><a href="/posts/{{$post->id}}/edit" class="button">Edit</a></td></div>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            <div class="pt-4">{{Form::submit('Löschen', ['class' => 'red button'])}}</div>
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
