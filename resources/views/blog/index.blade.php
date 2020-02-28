@extends('layouts.admin')

@section('content')
<div class="container-fluid">

 @if(\Session::has('success'))
 <div class="alert alert-success">
   {{\Session::get('success')}}
 </div>
 @endif

 <table class="table table-striped">
   <thead>
     <tr>
       <td><b>ID</b></td>
       <td><b>Title</b></td>
       <td><b>Category</b></td>
       <td><b>Published Date</b></td>
       <td><b>Status</b></td>
       <td colspan="3"><b></b></td>
     </tr>
   </thead>
   <tbody>
   @foreach($blogs as $blog)
     <tr>
       <td>{{$blog->id}}</td>
       <td>{{$blog->title}}</td>
       <td>{{$blog->category}}</td>
       <td>{{$blog->created_at->format('m/d/Y')}}</td>
       <td>{{$blog->status}}</td>
       <td><a href="{{ route('blog.show',$blog->slug)}}" target="_blank" class="btn btn-success">View</a></td>
       <td><a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-primary">Edit</a></td>
       <td>
         <form action="{{ route('blog.destroy', $blog->id)}}" method="post">
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

<script src="{{ asset('js/lib/summernote/summernote.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.summernote').summernote();
  });
</script>
@endsection
