@extends('layouts.app')
@section('content')

<style>
    #names{
        font-weight: 600;
        font-size: 26px;

    }
    .event-title{
        font-weight: bold;
    }
    .info{
        margin: 0 auto;
    }
    body{

        background-image: url("/images/twogirls.jpg");
        background-position: center;
    }
    .collection .collection-item{
        background: #757575;
    }

</style>
<main>
<div class="container">
    <div class="row">
        <div class="col s12 m4 l3">
        <img class="materialboxed circle responsive-img" width="250" src="/images/user-avatars/{{$user->avatar}}">

        <span id="names">
        {{$user->first_name}}
        {{$user->last_name}}<br>
        @if(isset($user->name))
            ({{$user->name}})
        @endif
        </span>


    </div>


        @if(count($events))
            <div class="col s12 m8 l9">
                <h5 class="row center white-text">Events</h5>
                <ul class="collection">
                    @foreach($events as $event)
                        <li  class="collection-item avatar center">
                            <a href="{{url('/event/'.$event->id)}}">
                                @if($event->is_public === 1)
                                    <i class="medium material-icons circle green">lock_open</i>
                                @endif
                                @if($event->is_public === 0)
                                    <i class="material-icons circle red">lock</i>
                                @endif
                                <span class="title event-title orange-text">{{$event->title}}</span>

                                <p class="indigo-text">{{$event->type}}<br>

                                    {{$event->description}}
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        @else
            <div class="col s12 m8 l9">
                <h5 class="center">Events</h5>
                <ul class="collection">
                    <li class="collection-item center orange-text">The user has not made any events yet</li>
                </ul>
            </div>
        @endif


</div>
</div>
</main>
@endsection