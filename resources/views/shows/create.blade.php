@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">Add Show</div>
		<form method="post" action="{{ route('shows.store') }}" enctype="multipart/form-data">
	    <div class="row justify-content-center">
	      <div class="col-md-6">
					<div class="card-body">
					  <div class="form-group">
							@csrf
					    <label for="show_name">Show Name</label>
					    <input type="text" name="show_name" class="form-control" id="show_name" placeholder="Ex: Dueces Are Wild">
					  </div>
						<div class="form-group">
							<label for="performer">Performer</label>
							<select class="form-control" name="performer" id="performer">
								@foreach($artists as $artist)
								<option value="{{$artist->id}}">{{$artist->name}}</option>
								@endforeach
							</select>
							<!-- <input type="text" name="performer" class="form-control" id="performer" placeholder="Ex: Aerosmith"> -->
						</div>
						<div class="form-group">
							<label for="venue_name">Venue Name</label>
							<select class="form-control" name="venue_name" id="venue_name">
								@foreach($venues as $venue)
								<option value="{{$venue->id}}">{{$venue->name}}</option>
								@endforeach
							</select>
							<!-- <input type="text" name="venue_name" class="form-control" id="venue_name" placeholder="Ex: Park MGM"> -->
						</div>
						<div class="form-group">
							<label for="show_type">Show Type</label>
							<input type="text" name="show_type" class="form-control" id="show_type" placeholder="MusicGroup">
						</div>
						<div class="form-group">
							<label for="availabilityStarts">On Sale Date</label>
							<div class='input-group date'>
								<input name="availabilityStarts" id="availabilityStarts" type="text" class="form-control">
								<span class="input-group-append">
									<span class="input-group-text"><i class="font-icon font-icon-calend"></i></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="startDate">Show Start Date</label>
							<div class='input-group date'>
								<input name="startDate" id="startDate" type="text" class="form-control">
								<span class="input-group-append">
									<span class="input-group-text"><i class="font-icon font-icon-calend"></i></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="eventStatus">Status</label>
							<select name="eventStatus" id="eventStatus" class="form-control form-control-lg">
								<option>Active</option>
								<option>In-Active</option>
							</select>
						</div>
						<div class="form-group">
							<label for="price">Price Starting At</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">$</div>
								</div>
								<input type="text" name="price" class="form-control" id="price" placeholder="0.00">
							</div>
						</div>
						<button type="submit" class="btn btn-danger">Submit</button>
					</div>
	      </div>
				<div class="col-md-6">
					<div class="card-body">
						<div class="form-group">
							<label for="hero_image">Hero Image (1400px x 630px)</label>
							<input type="file" name="hero_image" class="form-control">
						</div>
						<div class="form-group">
							<label for="featured_image">Featured Image (350px x 200px)</label>
							<input type="file" name="featured_image" class="form-control" id="featured_image">
						</div>
						<div class="form-group">
					    <label for="show_desc">Show Description</label>
					    <textarea name="show_desc" class="form-control" id="show_desc" rows="5"></textarea>
					  </div>
						<div class="form-group">
							<label for="video_embed">Youtube Video ID (https://www.youtube.com/embed/xxxxxx)</label>
							<input type="text" name="video_embed" class="form-control" id="show_desc" rows="5">
						</div>
					</div>
				</div>
		</form>
		</div>
	</div>
</div>

<script src="{{ asset('js/lib/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/lib/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
<script src="{{ asset('js/lib/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/lib/prism/prism.js') }}"></script>

<script>
	$('#startDate').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		locale: {
				format: 'YYYY-MM-DD'
		}
	});

	$('#availabilityStarts').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		locale: {
				format: 'YYYY-MM-DD'
		}
	});
</script>
@endsection
