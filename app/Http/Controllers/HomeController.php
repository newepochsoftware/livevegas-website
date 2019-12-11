<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Artists;
use App\Venue;
use App\Tickets;
use App\Shows;
use App\Hero;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sorted = Shows::with('latestTickets')->get()->sortBy('latestTickets.ticketDate');
        $mytime = Carbon::now();
        $shows = $sorted;
        $showList = $sorted->sortBy('artists.name');
        $artists = Artists::all()->sortBy('name');
        $hero = Hero::all();
        $venues = Venue::all();
        $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        $ticketsUpdate = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        return view('home', compact('shows', 'tickets', 'venues', 'artists', 'mytime', 'hero', 'showList', 'ticketsUpdate'));
    }

    public function allartist()
    {
        $sorted = Shows::with('latestTickets')->get()->sortBy('latestTickets.ticketDate');
        $mytime = Carbon::now();
        $shows = $sorted;
        $showList = $sorted->sortBy('artists.name');
        $artists = Artists::all()->sortBy('name');
        $hero = Hero::all();
        $venues = Venue::all();
        $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        $ticketsUpdate = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        return view('shows.all', compact('shows', 'tickets', 'venues', 'artists', 'mytime', 'hero', 'showList', 'ticketsUpdate'));
        // return response()->json(compact('shows'), 200);
    }

    public function showAPI(Shows $shows)
    {
        $shows = Shows::with('tickets', 'venues', 'artists', 'nextTickets', 'latestTickets')->get()->where('latestTickets.ticketDate', '>', date('Y-m-d'));
        return $shows->toJson();
    }

    public function artistAPI(Shows $shows)
    {
        $artists = Artists::all();
        $venues = Venue::all();
        $shows = Shows::all();
        $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        return response()->json(compact('artists', 'tickets', 'shows'), 200);
    }

}
