@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                               {{ session('status') }}
                            </div>
                        @endif
                        <a href="/events/create" class="btn btn-primary">Create Event</a>
                        <hr>
                    @if(count($events)==0)
                        <h4>You have not organised any events yet</h4>
                        @else
                            <h4>Your organised events</h4>
                            <table class="table table-striped">
                            <tr></tr>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$event->title}}</td>
                                <td><a href="/events/{{$event->id}}/edit" class="btn btn-info">Edit</a></td>
                                <td>
                                    {!!Form::open(['action'=>['EventsController@destroy', $event->id], 'method'=>'POST', 'class'=>'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' =>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
