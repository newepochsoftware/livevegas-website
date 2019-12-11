<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use App\Shows;
use Carbon\Carbon;

class TicketsController extends Controller
{
  public function index()
  {
    $tickets = Tickets::all();
    //
    return view('tickets.index', compact('tickets'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // return view('venues.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $tickets = new Tickets();
    $tickets->ticketDate = $request->get('ticketDate');
    // $tickets->ticketTime = $request->get('ticketTime');
    $tickets->ticket_url = $request->get('ticket_url');

    $shows = Shows::find($request->get('shows_id'));
    $shows->tickets()->save($tickets);

    return back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // $venues = Venue::find($id);
    // return view('venues.show', compact('venues'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

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
    $tickets = Tickets::find($id);
    $tickets->delete();

    return back();
  }
}
