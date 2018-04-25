@extends('layouts.app')
@section('content')
    <a href="/events/{{$event->id}}" class="btn btn-basic"> Go Back <a/>
        <div>
                {!! Form::open(['action' => ['EmailsController@send', $event->id], 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::hidden("eventId", $event->id)}}
                </div>
                <div class='form-group'>
                    {{Form::label('title_label', 'Name: ')}}
                    {{Form::text('senderName', '', ['class' => 'form-control', 'placeholder', 'Joe Blog'])}}
                </div>

                <div class='form-group'>
                    {{Form::label('email_address_label', 'Your E-Mail: ')}}
                    {{Form::text('senderAddress', '', ['class' => 'form-control', 'placeholder', 'joeblog@gmail.com'])}}
                </div>

                <div class='form-group'>
                    {{Form::label('email_body_label', 'Message To Organiser: ')}}
                    {{Form::textarea('emailBody', '', ['id' => 'article-ckeditor','class' => 'form-control', 'Body Text', 'Message'])}}
                </div>

            {{Form::submit('Send Email To Organiser', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>                       
@endsection