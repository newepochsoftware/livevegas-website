@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">Add Venue</div>
			<form method="post" action="{{ route('venues.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
				      <div class="form-group">

								<label for="venue_name">Venue Name</label>
								<input type="text" name="venue_name" class="form-control" id="venue_name" placeholder="Ex: Park MGM">

								<label for="venue_address">Address</label>
								<input type="text" name="venue_address" class="form-control" id="venue_address" placeholder="Ex: 3770 S Las Vegas Blvd">

								<label for="venue_city">City</label>
								<input type="text" name="venue_city" class="form-control" id="venue_city" placeholder="Las Vegas">

								<label for="map_embed">Google Map URL</label>
								<input type="text" name="map_embed" class="form-control" id="map_embed" placeholder="https://www.google.com/maps/embed?pb=!1m18!1m12!1m...">

								<br/><button type="submit" class="btn btn-danger">Submit</button>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

				        <label for="venue_state">State</label>
				        <input type="text" name="venue_state" class="form-control" id="venue_state" placeholder="NV">

				        <label for="venue_zip">Zip</label>
				        <input type="text" name="venue_zip" class="form-control" id="venue_zip" placeholder="89109">


								<div class="form-group">
									<label for="featured_image">Venue Logo (350px x 200px)</label>
									<input type="file" name="venue_thumb" class="form-control" id="venue_thumb">
								</div>
							</div>
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
		venueDropdowns: true,
		locale: {
				format: 'YYYY-MM-DD'
		}
	});

	$('#availabilityStarts').daterangepicker({
		singleDatePicker: true,
		venueDropdowns: true,
		locale: {
				format: 'YYYY-MM-DD'
		}
	});
</script>
@endsection
