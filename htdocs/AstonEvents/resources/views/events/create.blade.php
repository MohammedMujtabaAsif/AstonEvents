@extends('layouts.app') 
@section('content')
<h1>Create Event</h1>
<div>
    {!! Form::open(['action' => 'EventsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {{Form::label('title_label', 'Title: ')}}
            {{Form::text('eventTitle', '', ['class' => 'form-control', 'placeholder', 'title'])}}
        </div>
        <div class='form-group'>
            {{Form::label('body_label', 'Body: ')}}
            {{Form::textarea('eventBody', '', ['id' => 'article-ckeditor','class' => 'form-control', 'Body Text', 'body'])}}
        </div>
        <div class='form-group'>
            {{Form::label('event_location_label', 'Event Location: ')}}
            {{Form::text('eventLocation', '', ['class' => 'form-control', 'placeholder', 'Location'])}}
        </div>
        <div class = 'form-group'>            
            {{Form::label('event_type_label', 'Event Type: ')}}
            {{Form::select('eventType', array('Sport' => 'Sport', 'Culture' =>'Culture', 'Other' => 'Other'))}}
        </div>

        <div>
            <br/>
            <h3>Date and time cannot be edited after creation.</h3>
            <div class='form-group'>
                {{Form::label('start_day_label', 'Start Date of Event: ')}}
                {{Form::selectRange('eventStartDay', 1, 31)}} 
                {{Form::selectMonth('eventStartMonth')}} 
                {{Form::selectRange('eventSartYear', 2018, 2099)}}
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
            </div>
        </div>

        <div class="form-group">
                {{Form::label('image_upload', 'Image Upload (Max: 2MB): ')}}
                {{Form::file('eventImage')}}
            </div>
</div>
        
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection