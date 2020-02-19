@extends('layouts.app')

@section('content')

<div class="container" style="padding-top:50px" >
    <div class="card" >
        <div class=""style="margin-bottom: 20px;">
            <div class=""style="margin-top:10px;margin-left:10px;">
                <h2>Dashboard</h2>
            </div>  
            <div class=""style="margin-bottom:;margin-left:12px;">
                <h4>Alle deine Kameras im Überblick</h4>
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
                            @foreach($posts as $post)
                                <tr>
                                    <td><img style="width:40%" class="" src="/png/videoplayer.jpg">
                                    </td>
                                    
                                    <td> <div style="margin-top: 5px"><h4>Titel: {{$post->title}}</h4></div></td>
                                    
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary btn-rounded btn-md ml-4">Edit</a></td>
                                    <td><a href="" class="btn btn-outline-primary btn-rounded btn-md ml-4">Rules</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                            @endif
            
                        </div>
</div>
  
@endsection
