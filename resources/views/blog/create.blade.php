@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css/lib/summernote/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/pages/editor.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/separate/pages/mail.min.css') }}">

@section('content')
<div class="container-fluid">
  @if ($errors->any())
  <div class="alert alert-danger">
   <ul>
     @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
   </ul>
  </div><br />
  @endif
  <div class="container-fluid">
    <div class="card">
       <div class="card-header">New Blog Post</div>
       <div class="card-body">
         <div class="row">
          <div class="col-md-9">
             <form method="post" action="{{url('blog')}}">

                 <div class="form-group">
                   <input type="hidden" value="{{csrf_token()}}" name="_token" />
                   <label for="title">Title:</label>
                   <input type="text" class="form-control" name="title"/>

                   <label for="description">Description:</label>
                   <div class="summernote-theme-1">
                     <textarea cols="10" rows="10" class="summernote" name="description"></textarea>
                   </div>
                   <div class="chat-area-bottom">
                     <button type="submit" class="btn btn-rounded float-left">Submit</button>
                     <button type="reset" class="btn btn-rounded btn-default float-left">Clear</button>
                   </div><!--.chat-area-bottom-->
                 </div>
              </div>

              <div class="col-3">
                <div class="form-group">
                  <label for="title">Status:</label>
                  <select class="custom-select d-block w-100" id="status" name="status">
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                  </select>
                </div>
                <div class="form-group">
                 <label for="title">Category:</label>
                 <input type="text" class="form-control" value="Press" name="category"/>
                </div>
                <div class="form-group">
                 <label for="featured_image">Featured Image (350px x 200px)</label>
                 <input type="file" name="featured_image" class="form-control" id="featured_image">
                </div>
              </div>


             </form>
           </div>
         </div>
       </div>
     </div>
   </div>

</div>

<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/lib/summernote/summernote.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.summernote').summernote();
  });
</script>

@endsection
