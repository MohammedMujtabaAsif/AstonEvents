@extends('layouts.app')
@section('content')
<a href="/events" class="btn btn-basic"> Go Back <a/>
    <div class="card card-body bg-light">
        <div>
            <h2>{{$event->title}}</h2>
        </div>

        <div>
            <img style="width:100%" src="/storage/eventImages/{{$event->event_image}}">
        </div>
        
            <br/>
        <div class="card card-body">
            <div class="card card-body">
            <h4>{!!$event->body!!}</h4>
            </div> 

            <div class="card card-body">
                <h6>Event Type: {!!$event->event_type!!}</h6>
            </div>

            <div class="card card-body">
                <h6>Event Starts: {!!$event->event_start!!}</h6>
            </div>
            
            <div class="card card-body">
                <h6>Event Ends: {!!$event->event_end!!}</h6>
            </div>
            
            <div class="card card-body">
                <h6>Event Location: {!!$event->event_location!!}</h6>
            </div>
            
            <div class="card card-body">
                <small> Written on {{$event->created_at}} by {{$event->user->name}} </small>
            </div>
    </div>
    
        <br/>

        <div>
            {!! Form::open(['action' => ['EmailsController@show', $event->id], 'method' => 'get']) !!}
            {{Form::submit('Send Email To Organiser', ['class' => 'btn btn-primary'])}} 
            {!! Form::close() !!}              
        </div>


        <br/><br/>

        <div>
            @guest
                @else
                    @if(Auth::user()->id == $event->user_id)
                        <a href="/events/{{$event->id}}/edit" class="btn btn-primary">Edit</a>

                        {!!Form::open(['action'=>['EventsController@destroy', $event->id], 'method'=>'POST', 'class'=>'float-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}

                        {{Form::submit('Delete', ['class' =>'btn btn-danger'])}}
                        {!!Form::close()!!}
                    @endif
            @endguest
        </div>
    </div>
@endsection