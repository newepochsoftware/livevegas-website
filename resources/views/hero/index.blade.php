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
          <td>Image</td>
          <td>Link</td>
          <td>Order</td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($hero as $heroes)
        <tr>
            <td>{{$heroes->id}}</td>
            <td><img src="{{$heroes->image}}" alt="{{$heroes->alt}}" width="400px"></td>
            <td>{{$heroes->link}}</td>
            <td>{{$heroes->hero_order}}</td>
            <td><a href="{{ route('hero.edit',$heroes->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('hero.destroy', $heroes->id)}}" method="post">
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
