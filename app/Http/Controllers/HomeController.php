<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

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

    public function store(Request $request)
    {

        $profileName = "Default";
        $ip = filter_input(INPUT_SERVER, "REMOTE_ADDR");
        $post = json_encode($_POST);
        error_log("Contest Lander [$profileName] [$ip] [$post]");

        $api_email    = "amandamoore@livenation.com";
        $dynamixkey   = "d8IFh_cde0673cde720f51977fdc8631a6d6ff70660348";
        $glowfishkey  = "OUqdb_d43daa37acb2727401f575f11a1944439ca15713";

        require_once 'nes/Colugo/API.php';

        $user = new \Colugo\API\User($api_email, $glowfishkey);
        $api = new \Colugo\API\API($user);

        $queryString = filter_input(INPUT_POST, "query_string");
        $qsMap = [
            "Campaign"          => "campaign",
            "Ad Group"          => "adgroupid",
            "Feed Item Id"      => "feeditemid",
            "Target Id"         => "targetid",
            "Loc Physical Ms"   => "loc_physical_ms",
            "Loc Interest Ms"   => "loc_interest_ms",
            "Match Type"        => "matchtype",
            "Network"           => "network",
            "Device"            => "device",
            "Device Model"      => "devicemodel",
            "If Search"         => "ifsearch",
            "If Content"        => "ifcontent",
            "Creative"          => "creative",
            "Keyword"           => "keyword",
            "Placement"         => "placement",
            "Ad Position"       => "adposition"
        ];
        $qs = [];
        parse_str($queryString, $qs);

        $firstName  = $request->get('firstName');
        $lastName   = $request->get('lastName');
        $email_addr = $request->get('email');
        $phone      = $request->get('phone');
        $zip        = $request->get('zipcode');
        $optin      = $request->get('agecheck');
        $lvToken    = filter_input(INPUT_POST, "leadverified_token");
        $_SESSION["leadverified_token"] = $lvToken;

        if ($firstName && $lastName && $email_addr) {
            // must include first, last and email
            $lead = new \Colugo\API\Lead();
            $lead->setLeadSource("LIVEVEGAS");
            $lead->setLeadIpAddress($ip);
            $fields = [
                "Profile"       => $profileName,
                "First Name"    => $firstName,
                "Last Name"     => $lastName,
                "Mobile Phone"  => $phone,
                "Email"         => $email_addr,
                "Zip"           => $zip,
                "Query String"  => $queryString,
                "HTTP Referer"  => filter_input(INPUT_POST, "http_referer"),
                "HTTP User Agent" => filter_input(INPUT_SERVER, "http_user_agent"),
                "LeadVerified Token" => $lvToken
            ];
            foreach ($qsMap as $fieldName => $qName) {
                if (isset($qs[$qName])) {
                    $fields[$fieldName] = $qs[$qName];
                }
            }
            $lead->setFields($fields);
            $api->post($lead);
            // store the lead id into the session
            $_SESSION["lead_id"] = $lead->getId();

        }

      echo json_encode(["status" => "success"]);

      return redirect('/thank-you')->with('success', "You're on the Live Vegas list! You'll be the first to know about residency announcements, earlybird ticket sales, special offers, and Live Vegas giveaways for VIP experiences and meet & greets with artists!");
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
        $shows = Shows::with('tickets', 'venues', 'artists')->get()->where('latestTickets.ticketDate', '>=', date('Y-m-d'));
        return $shows->toJson();
    }

    public function artistAPI(Shows $shows)
    {
        $artists = Artists::all();
        $venues = Venue::all();
        $shows = Shows::all();
        $tickets = Tickets::with('shows', 'venues')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        return response()->json(compact('artists', 'tickets', 'shows'), 200);
    }
    public function allshowsAPI(Shows $shows)
    {
        $artists = Artists::all();
        $venues = Venue::all();
        $shows = Shows::with('tickets', 'venues', 'artists', 'nextTickets', 'latestTickets')->get()->where('latestTickets.ticketDate', '>', date('Y-m-d'));
        $tickets = Tickets::with('shows', 'venues')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');
        return response()->json(compact('artists', 'tickets', 'shows'), 200);
    }

}
