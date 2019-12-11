@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Show</td>
          <td>Performer</td>
          <td>EventStatus</td>
          <td>Venue</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($shows as $show)
        <tr>
            <td>{{$show->id}}</td>
            <td>{{$show->name}}</td>
            <td>{{$show->artists->name}}</td>
            <td>{{$show->eventStatus}}</td>
            <td>{{$show->venues->name}}</td>
            <td><a href="{{ route('shows.edit',$show->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="/shows/{{ $show->slug }}" target="_blank" class="btn btn-success">View</a></td>
            <td>
                <form action="{{ route('shows.destroy', $show->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
