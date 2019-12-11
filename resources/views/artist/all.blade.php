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
          <td>Bio</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($artists as $artist)
        <tr>
            <td>{{$artist->id}}</td>
            <td>{{$artist->name}}</td>
            <td>{{$artist->bio}}</td>
            <td><a href="{{ route('artist.edit',$artist->id)}}" class="btn btn-primary">Edit</a></td>
            <!-- <td><a href="/artists/{{ $artist->id }}" target="_blank" class="btn btn-success">View</a></td> -->
            <td>
                <form action="{{ route('artist.destroy', $artist->id)}}" method="post">
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
