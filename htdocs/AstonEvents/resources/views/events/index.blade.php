@extends('layouts.app') 
@section('content')
<div class="card card-body">
    <h1>Events</h1>

<div class="card card-body bg-light">
    @if(count($events)>0)
    <div>
            {!! Form::open() !!}
            {!! Form::hidden("sort_event", 'sort_event')!!}
            <h3>Sort By:</h3>
            <h6>{{ Form::radio('event_sort', 'date', true) }}  Recently Posted</h6>
            <h6>{{ Form::radio('event_sort', 'likes') }}  Most Liked</h6>
            <h6>{{ Form::radio('event_sort', 'name') }}  A to Z</h6>
            <br/>
            <button type="submit" class="btn btn-default">Sort</button>
            {!! Form::close()!!}
        </div>
</div>
        @foreach($events as $event)
            <br/>
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4">
                        <img style="width:100%" src="/storage/eventImages/{{$event->event_image}}">
                    </div>
                    <div class="col-md-8">
                        <h2><a href="/events/{{$event->id}}">{{$event->title}}</a></h2>
                        <h4>{!!$event->event_type!!}</h4>                        
                        <h5>{!!$event->event_start!!}</h5>
                        <div>
                            {!! Form::open() !!}
                            {!! Form::hidden("like_event", $event->id)!!}
                            <button type="submit" class="btn btn-info float-right">Like Event</button>
                                
                            <b><p style="color:red">Likes: {!!$like_count = \App\EventLike::where('event_id', $event->id)->count()!!}</p></b>
                            {{-- {{$like_count}} --}}
                            {!! Form::close()!!}
                        </div>
                        <small> Written on {{$event->created_at}} by {{$event->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$events->links()}} 
    @else
        <p>No events found!</p>
    @endif
        
</div>
@endsection