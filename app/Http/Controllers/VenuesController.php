<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;


class VenuesController extends Controller
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
      $venues = Venue::all()->sortBy('name');

      return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $venue_thumb = $request->file('venue_thumb');
      $name = time().'.'.$venue_thumb->getClientOriginalExtension();
      $destinationPath = public_path('uploads');

      $venues = new venue();
      $venues->name = $request->get('venue_name');
      $venues->address = $request->get('venue_address');
      $venues->city = $request->get('venue_city');
      $venues->state = $request->get('venue_state');
      $venues->zip = $request->get('venue_zip');
      $venues->map_embed = $request->get('map_embed');
      $venues->thumb = $venue_thumb->move($destinationPath, $name);
      $venues->save();
      return redirect('/venues')->with('success', 'A New Venue Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $venues = Venue::find($id);
      return view('venues.show', compact('venues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $venues = Venue::find($id);
      return view('venues.edit', compact('venues'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
