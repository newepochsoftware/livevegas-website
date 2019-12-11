@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">Add Artist</div>
			<form method="post" action="{{ route('artist.update', $artists->id) }}" enctype="multipart/form-data">
        @method('PATCH')
			  @csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
				      <div class="form-group">

								<label for="venue_name">Artist Name</label>
								<input type="text" required name="name" class="form-control" id="name" value="{{$artists->name}}">

								<label for="featured_image">Artist Image (350px x 200px)</label>
								<input type="file" id="featured_image" name="featured_image" class="form-control">
								<br/>
								<button type="submit" class="btn btn-danger">Submit</button>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
						    <label for="artist_bio">Artist Bio</label>
						    <textarea name="artist_bio" required class="form-control" id="artist_bio" rows="5">{{$artists->bio}}</textarea>
						  </div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
