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
          <td>Name</td>
          <td>Address</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($venues as $venue)
        <tr>
            <td>{{$venue->id}}</td>
            <td>{{$venue->name}}</td>
            <td>{{$venue->address}} {{$venue->city}}, {{$venue->state}} {{$venue->zip}}</td>
            <td><a href="{{ route('venues.edit',$venue->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="/venues/{{ $venue->id }}" target="_blank" class="btn btn-success">View</a></td>
            <td>
                <form action="{{ route('venues.destroy', $venue->id)}}" method="post">
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
