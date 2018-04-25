@extends('layouts.app') 
@section('content')
<h1>Edit Event</h1>
<div>
{!! Form::open(['action' => ['EventsController@update', $event->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class='form-group'>
                {{Form::label('title_label', 'Title: ')}}
                {{Form::text('eventTitle', $event->title, ['class' => 'form-control', 'placeholder', 'title'])}}
        </div>

        <div class='form-group'>
                {{Form::label('body_label', 'Body: ')}}
                {{Form::textarea('eventBody', $event->body, ['id' => 'article-ckeditor','class' => 'form-control', 'Body Text', 'body'])}}
        </div>

        <div class='form-group'>
                {{Form::label('event_location_label', 'Event Location: ')}}
                {{Form::text('eventLocation', $event->event_location, ['class' => 'form-control', 'placeholder', 'Location'])}}
        </div>

        <div class = 'form-group'>            
                {{Form::label('event_type_label', 'Event Type: ')}}
                {{Form::select('eventType', array('Sport' => 'Sport', 'Culture' =>'Culture', 'Other' => 'Other'),['class' => 'form-control', 'placeholder', $event->event_type])}}
        </div>

        <div class="form-group">
                {{Form::file('eventImage')}}
        </div>

{{--    <div class='form-group'>
                {{Form::label('start_day_label', 'Start Date of Event: ')}}
                {{Form::selectRange('eventStartDay', 1, 31)}} 
                {{Form::selectMonth('eventStartMonth')}} 
                {{Form::selectYear('eventSartYear', 2018, 2099)}}
        </div>

        <div class='form-group'>
                {{Form::label('start_day_label', 'Start Time of Event: ')}}
                {{Form::selectRange('eventStartHour', 0, 24)}} 
                {{Form::selectRange('eventStartMinute', 0, 60)}} 
        </div>
        
        <div class='form-group'>
                {{Form::label('end_day_label', 'End Date of Event: ')}}
                {{Form::selectRange('eventEndDay', 1, 31)}} 
                {{Form::selectMonth('eventEndMonth')}} 
                {{Form::selectRange('eventEndYear', 2018, 2099)}}
        </div>

        <div class='form-group'>
                {{Form::label('end_day_label', 'End Time of Event: ')}}
                {{Form::selectRange('eventEndHour', 0, 24)}} 
                {{Form::selectRange('eventEndMinute', 0, 60)}} 
        </div> --}}


        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
</div>

@endsection