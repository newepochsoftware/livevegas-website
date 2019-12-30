<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Artists;
use App\Venue;
use App\Tickets;
use App\Shows;
use Carbon\Carbon;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('auth', ['except' => array('show')]);
     }

     public function index()
     {
         $artists = Artists::all();
         $shows = Shows::with('artists')->get()->sortBy('artists.name');
         $venues = Venue::all();
         // dd($venues);
         return view('shows.index', compact('shows', 'artists', 'venues'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artists::all();
        $venues = Venue::all();

        return view('shows.create', compact('artists', 'venues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function shows(Shows $shows)
     {
         return $shows;
     }

    public function store(Request $request)
    {
        //
        $shows = new Shows();
        dd($shows);
        if ($request->hasFile('hero_image')) {
          $hero_image = $request->file('hero_image');
          $name = time().'-'.$hero_image->getClientOriginalName();
          $destinationPath = 'images';
          $shows->hero = $hero_image->move($destinationPath, $name);
          $shows->hero = '/'. $destinationPath . '/'. $name;
        }

        if ($request->hasFile('featured_image')) {
          $featured_image = $request->file('featured_image');
          $featureName = time().'-'.$featured_image->getClientOriginalName();
          $destinationPath = 'images';
          $shows->featured_image = $featured_image->move($destinationPath, $featureName);
          $shows->featured_image = '/'. $destinationPath . '/'. $featureName;
        }
        $urlSlug = $request->get('show_name');
        $urlLowerCaseSlug = strtolower($urlSlug);
        $slugNoSpaces = str_replace(" ", "-", $urlLowerCaseSlug);
        $sluglink = preg_replace('/[^A-Za-z0-9\-]/', '', $slugNoSpaces); // Removes special chars.
        $shows->slug = $sluglink;
        $shows->name = $request->get('show_name');
        $shows->artists_id = $request->get('performer');
        $shows->video = $request->get('video_embed');
        $shows->eventStatus = $request->get('eventStatus');
        $shows->price = $request->get('price');
        $shows->type = $request->get('show_type');
        $shows->description = $request->get('show_desc');
        $shows->venues_id = $request->get('venue_name');
        $shows->startDate = $request->get('startDate');
        $shows->availabilityStarts = $request->get('availabilityStarts');
        $shows->save();
        return redirect('/shows')->with('success', 'Show Has Been Added');
    }

    public function edit($id)
    {
        $shows = Shows::find($id);
        $tickets = $shows->tickets;
        return view('shows.edit', compact('shows'));
    }

    public function show($slug)
    {
        $shows = \App\Shows::where('slug', $slug)->firstOrFail();
        $mytime = Carbon::now('PST');
        // dd($shows->tickets);
        return view('shows.show', compact('shows','mytime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function update(Request $request, $id)
    {
      $shows = Shows::find($id);

      if ($request->hasFile('hero_image')) {
        $hero_image = $request->file('hero_image');
        $name = time().'.'.$hero_image->getClientOriginalExtension();
        $destinationPath = 'images';
        $shows->hero = $hero_image->move($destinationPath, $name);
        $shows->hero = '/'. $destinationPath . '/'. $name;
      }

      if ($request->hasFile('featured_image')) {
        $featured_image = $request->file('featured_image');
        $featureName = time().'.'.$featured_image->getClientOriginalExtension();
        $destinationPath = 'images';
        $shows->featured_image = $featured_image->move($destinationPath, $featureName);
        $shows->featured_image = '/'. $destinationPath . '/'. $featureName;
      }
      $shows->name = $request->get('show_name');
      $shows->slug = $request->get('show_slug');
      $shows->artists_id = $request->get('performer');
      $shows->video = $request->get('video_embed');
      $shows->eventStatus = $request->get('eventStatus');
      $shows->price = $request->get('price');
      $shows->type = $request->get('show_type');
      $shows->description = $request->get('show_desc');
      $shows->venues_id = $request->get('venue_name');
      $shows->startDate = $request->get('startDate');
      $shows->availabilityStarts = $request->get('availabilityStarts');

      $shows->save();

      return redirect('/shows')->with('success', 'Show has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $shows = Shows::find($id);
      $shows->delete();

      return redirect('/shows')->with('success', 'Show has been deleted');
    }

}
