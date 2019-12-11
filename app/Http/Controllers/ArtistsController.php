<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Artists;
use App\Venue;
use App\Tickets;
use App\Shows;
use Carbon\Carbon;

class ArtistsController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth', ['except' => array('index')]);
    }
    public function index()
    {
        $artists = Artists::all();
        $venues = Venue::all();
        $shows = Shows::all();
        $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        // dd($tickets);

        return view('artist.index', compact('artists', 'tickets', 'shows'));
    }
    public function allartist()
    {
        $artists = Artists::all()->sortBy('name');
        return view('artist/all', compact('artists'));
    }
    public function show(Artist $artists)
    {
        return $artists;
    }
    public function create()
    {
      return view('artist.create');
    }
    public function store(Request $request)
    {
      $artists = new artists();

      if ($request->hasFile('featured_image')) {
        $featured_image = $request->file('featured_image');
        $name = time().'.'.$featured_image->getClientOriginalExtension();
        $destinationPath = 'images';
        $artists->featured_image = $featured_image->move($destinationPath, $name);
        $artists->featured_image = '/'. $destinationPath . '/'. $name;;
      }

      $artists->name = $request->get('name');
      $artists->bio = $request->get('artist_bio');
      $artists->save();
      return redirect('/all')->with('success', 'Artist Has Been Added');
    }
    public function edit($id)
    {
      $artists = artists::find($id);
      return view('artist.edit', compact('artists'));
    }
    public function update(Request $request, $id)
    {
        $artists = artists::find($id);

        if ($request->hasFile('featured_image')) {
          $featured_image = $request->file('featured_image');
          $name = time().'.'.$featured_image->getClientOriginalExtension();
          $destinationPath = 'images';
          $artists->featured_image = $featured_image->move($destinationPath, $name);
          $artists->featured_image = '/'. $destinationPath . '/'. $name;;
        }

        $artists->name = $request->get('name');
        $artists->bio = $request->get('artist_bio');
        $artists->save();
        return redirect('/all')->with('success', 'Artist Has Been Added');
    }

    public function delete(Artist $artists)
    {
        $artists->delete();

        return response()->json(null, 204);
    }
}
