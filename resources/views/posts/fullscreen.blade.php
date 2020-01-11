
<style>
    .pb-video-container {
        padding-top: 20px;
        background: #bdc3c7;
        font-family: Lato;
    }

    .pb-video {
        border: 1px solid #e6e6e6;
        padding: 5px;
    }

        .pb-video:hover {
            background: #;
        }

    .pb-video-frame {
        transition: width 2s, height 2s;
    }

        .pb-video-frame:hover {
            height: 400px;
            width: 700px;
        }

    .pb-row {
        margin-bottom: 10px;
    }
</style>


@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="row">
        <div class=""style="margin-bottom: 10px">
            <a href="/posts/create" class="btn btn-primary">New camera</a>
        </div>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <iframe width="300" height="200" src="{{$post->body}}" marginheight="0" marginwidth="0" frameborder="0" scrolling="no" allow="fullscreen; accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                       

                                    </td>
                                    <td>
                                        
                                       <a href="/posts/create" class="btn btn-outline-dark btn-sm">Full screen</a>
                                       
                                      
                                    </td>
                                   
                                    <td>
                                    <div class="center-block">
                                    <a href="/posts/create" class="btn btn-outline-dark btn-sm">Edit</a>
                                    <!--<td><p>{{$post->title}}</p></td>-->
                                    </div>
                                </td>
                                   
                                </tr>
                            @endforeach
                        </table>
                    @else
                    <div class="panel-body"><img src="/png/one-more-step.png" alt="NoCamera" width="404px" height="238px"></div>
                    <div class="panel-body"><span>All you have to do now is to click on New camera and copy your steaming-link and then you can start watching live video feed!</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
