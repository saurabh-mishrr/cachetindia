@extends('admin.layout')

@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>View Event list</h2>
</div>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
</div>
<br>
</div>
</div>
<!-- @if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif-->
<table class="table table-bordered">
<tr>
<th>Event id</th>
<th>Name</th>
<th>type</th>
<th>status</th>
<th width="280px">Action</th>
</tr>
@foreach ($event as $event)
<tr>
<td>{{ $event->event_id }}</td>
<td>{{ $event->name }}</td>
<td>{{ $event->type }}</td>
<td>{{ $event->status }}</td>
<td>
<form action="{{ route('events.destroy',$event->event_id) }}" method="POST">

@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@stop