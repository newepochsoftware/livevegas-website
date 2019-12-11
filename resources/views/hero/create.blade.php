@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">Add Hero Image</div>
			<form method="post" action="{{ route('hero.store') }}" enctype="multipart/form-data">
        <!-- @method('PATCH') -->
			  @csrf
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
				      <div class="form-group">
								<label for="featured_image">Hero Image (1400px x 630px)</label>
								<input type="file" name="featured_image" class="form-control" id="featured_image">
								<br/>
								<button type="submit" class="btn btn-danger">Submit</button>

							</div>
						</div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="url_link">Url Link</label>
								<input type="text" required name="url_link" class="form-control" id="url_link">
              </div>
            </div>
						<div class="col-md-3">
							<div class="form-group">
						    <label for="alt_Tag">Alt Tag</label>
                <input type="text" required name="alt_Tag" class="form-control" id="alt_Tag">
						  </div>
						</div>
            <div class="col-md-3">
							<div class="form-group">
						    <label for="alt_Tag">Order Number</label>
                <input type="text" required name="hero_order" class="form-control" id="hero_order">
						  </div>
						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
