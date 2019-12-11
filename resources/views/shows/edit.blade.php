@extends('layouts.admin')

@section('content')
<style>
  .uper {
    margin-bottom: 40px;
  }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <div class="card uper">
        <div class="card-header">
          Edit shows
        </div>
        <div class="row justify-content-center">
          <div class="col">
            <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
            <form method="post" action="{{ route('shows.update', $shows->id) }}" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="form-group">
                <label for="show_name">Show Name</label>
                <input type="text" name="show_name" class="form-control" id="show_name" placeholder="Ex: Dueces Are Wild"  value="{{ $shows->name }}" >
              </div>
              <div class="form-group">
                <label for="show_name">URL Slug</label>
                <input type="text" name="show_slug" class="form-control" id="show_slug" placeholder="Ex: artist-show-name"  value="{{ $shows->slug }}" >
              </div>
              <div class="form-group">
                <label for="performer">Performer</label>
                <select class="form-control" name="performer" id="performer">
                  <option value="{{$shows->artists->id}}">{{$shows->artists->name}}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="venue_name">Venue Name</label>
                <select class="form-control" name="venue_name" id="venue_name">
                  <option value="{{$shows->venues->id}}">{{$shows->venues->name}}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="show_type">Show Type</label>
                <input type="text" name="show_type" class="form-control" id="show_type" placeholder="MusicGroup" value="{{ $shows->type }}">
              </div>
              <div class="form-group">
                <label for="availabilityStarts">On Sale Date</label>
                <div class='input-group date'>
                  <input name="availabilityStarts" id="availabilityStarts" type="text" class="form-control" value="{{ $shows->availabilityStarts }}">
                  <span class="input-group-append">
                    <span class="input-group-text"><i class="font-icon font-icon-calend"></i></span>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="startDate">Show Start Date</label>
                <div class='input-group date'>
                  <input name="startDate" id="startDate" type="text" class="form-control" value="{{ $shows->startDate }}">
                  <span class="input-group-append">
                    <span class="input-group-text"><i class="font-icon font-icon-calend"></i></span>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="eventStatus">Status</label>
                <select name="eventStatus" id="eventStatus" class="form-control form-control-lg" value="{{ $shows->eventStatus }}">
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
                  <input type="text" name="price" class="form-control" id="price" placeholder="0.00" value="{{ $shows->price }}">
                </div>
              </div>

              <div class="form-group">
                <label for="show_desc">Show Description</label>
                <textarea name="show_desc" class="form-control" id="show_desc" rows="5">{{ $shows->description }}</textarea>
              </div>
              <div class="form-group">
                <label for="video_embed">Youtube Video ID (https://www.youtube.com/embed/xxxxxx)</label>
                <input type="text" name="video_embed" class="form-control" id="show_desc" rows="5" value="{{ $shows->video }}">
              </div>
              <button type="submit" class="btn btn-danger">Update</button>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-6">

        <div class="card uper">
          <div class="card-header">
            Update Hero Image
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-5">
                <img src="{{ $shows->hero }}" width="100%">
              </div>

              <div class="col-sm-7">
                <div class="form-group">
                  <label for="hero_image">Hero Image (1400px x 630px)</label>
                  <input type="file" name="hero_image" name="hero_image" class="form-control">
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="card uper">
          <div class="card-header">
            Update Featured Image
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-5">
                <img src="{{ $shows->featured_image }}" width="100%">
              </div>

              <div class="col-sm-7">
                <div class="form-group">
                  <label for="featured_image">Featured Image (350px x 200px)</label>
                  <input type="file" name="featured_image" class="form-control" id="featured_image">
                </div>
              </div>

            </div>
          </div>
        </div>

      </form>

      <form method="post" action="{{ route('tickets.store') }}">
        @csrf
        <input type="hidden" name="shows_id" value="{{ $shows->id }}" />
        <div class="card uper">
          <div class="card-header">
            Add Tickets
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <input type="text" name="ticketDate" id="ticketDate" class="form-control flatpickr" placeholder="Date & Time" data-enable-time="true">
                </div>
              </div>
              <!-- <div class="col-md-2">
                <div class="form-group">
                  <input type="text" name="ticketTime" id="ticketTime" class="form-control" placeholder="Start Time">
                </div>
              </div> -->
              <div class="col-sm-7">
                <div class="form-group">
                  <input type="text" name="ticket_url" id="ticket_url" class="form-control" placeholder="Ticket URL">
                </div>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-default btn-block">Add</button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="card uper">
        <div class="card-header">{{ $shows->name }} Tickets</div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col-sm-2">#</th>
                <th scope="col-sm-4">Show Date</th>
                <!-- <th scope="col-md-2">Time</th> -->
                <th scope="col">Ticket Url</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($shows->tickets as $ticket)
            <tr>
                <th scope="row"><strong>{{ $ticket->id }}</strong></th>
                <td>{{ date('M j', strtotime($ticket->ticketDate)) }}</td>
                <!-- <td>{{ $ticket->ticketTime }}</td> -->
                <td>{{ $ticket->ticket_url }}</td>
                <td>
                  <form action="{{ route('tickets.destroy', $ticket->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                    <div><button class="btn btn-danger">Delete Ticket</button></div>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
      </div>
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
  $('.flatpickr').flatpickr();

	$('#startDate').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		locale: {
				format: 'YYYY-MM-DD'
		}
	});

  // $('#ticketDate').daterangepicker({
	// 	singleDatePicker: true,
	// 	showDropdowns: true,
	// 	locale: {
	// 			format: 'YYYY-MM-DD'
	// 	}
	// });

	$('#availabilityStarts').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		locale: {
				format: 'YYYY-MM-DD'
		}
	});
</script>

@endsection
