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
								<input type="text" name="venue_name" class="form-control" id="venue_name" placeholder="Ex: Park MGM" value="{{ $venues->name }}">

								<label for="venue_address">Address</label>
								<input type="text" name="venue_address" class="form-control" id="venue_address" placeholder="Ex: 3770 S Las Vegas Blvd" value="{{ $venues->address }}">

								<label for="venue_type">City</label>
								<input type="text" name="venue_city" class="form-control" id="venue_city" placeholder="Las Vegas" value="{{ $venues->city }}">
								<button type="submit" class="btn btn-danger">Submit</button>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">

				        <label for="venue_type">State</label>
				        <input type="text" name="venue_state" class="form-control" id="venue_state" placeholder="NV" value="{{ $venues->state }}">

				        <label for="venue_type">Zip</label>
				        <input type="text" name="venue_zip" class="form-control" id="venue_zip" placeholder="89109" value="{{ $venues->zip }}">

								<div class="form-group">
									<label for="featured_image">Venue Logo</label>
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
