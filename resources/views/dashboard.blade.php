@extends('layouts.app')

@section('content')
<style>
    .trigger {
padding: 1px 10px;
font-size: 12px;
font-weight: 400;
border-radius: 10px;
background-color: #eee;
color: #212121;
display: inline-block;
margin: 2px 5px;
}

.hoverable, .trigger {
transition: box-shadow 0.55s;
box-shadow: 0;
}

.hoverable:hover, .trigger:hover {
transition: box-shadow 0.45s;
box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
<div class="container">
    
        <div class="card"style="margin-bottom: 20px;">
            <div class=""style="margin-top:10px;margin-left:10px;">
                <h2>Dashboard</h2>
            </div>  
            <div class=""style="margin-bottom:;margin-left:10px;">
                <h4>You can manage your kamaras here.</h4>
            </div>  
            <div class=""style="margin-bottom:10px;margin-left:10px;">
                <a href="/posts/create" class="btn btn-primary">New camera</a>
                
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
                                    <td><iframe width="300" height="200" src="{{$post->body}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
  
@endsection
