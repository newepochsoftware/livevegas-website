<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Artists;
use App\Venue;
use App\Tickets;
use App\Shows;
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::any('/search',function(Request $request){
    $filterFromDate = $request->get( 'filterFromDatetxt' );
    $filterToDate = $request->get( 'filterToDatetxt' );
    $artists = $request->get( 'artists' );

    $tickets = Tickets::with('shows')->whereBetween('ticketDate', [$filterFromDate, $filterToDate])
                ->orWhere('shows_id', $artists)->get()->sortBy('ticketDate');

    // $tickets = Tickets::with('shows')->where('ticketDate', '<', $filterToDate)->get()->sortBy('ticketDate');
    // $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();

    $artists = Artists::all()->sortBy('name');
    $venues = Venue::all();
    $shows = Shows::all();

    return view('artist.index', compact('shows', 'tickets', 'venues', 'artists'));
});

Route::get('/admin', function () { return view('auth/login'); });
Route::get('/privacy', function () { return view('legal/privacy'); });

Route::get('/press', 'BlogController@press')->name('press');
Route::resource('blog', 'BlogController');
Route::resource('artist', 'ArtistsController');
Route::get('all', 'ArtistsController@allartist')->name('artist.all');
Route::resource('hero', 'HeroController');
Route::resource('tickets', 'TicketsController');
Route::resource('venues', 'VenuesController');
Route::resource('shows', 'ShowController');
Route::get('/all-shows', 'ArtistsController@index')->name('all-shows');
Route::get('/all-artists', 'HomeController@allartist')->name('all-artists');
