<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Blog;
use App\Artists;
use App\Venue;
use App\Tickets;
use App\Shows;
use Carbon\Carbon;

class BlogController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => array('index', 'press', 'show')]);
  }
  public function index()
  {

    $blogs = Blog::where('user_id', auth()->user()->id)->get();
    $artists = Artists::all();
    $venues = Venue::all();
    $shows = Shows::all();
    $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');

    return view('blog.index',compact('blogs', 'shows', 'artists', 'tickets'));
  }

  public function press()
  {

    $blogs = Blog::all();
    $artists = Artists::all();
    $venues = Venue::all();
    $shows = Shows::all();
    $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');

    return view('blog.press',compact('blogs', 'shows', 'artists', 'tickets'));
  }

  public function create()
  {
    return view('blog.create');
  }

  public function saveBlog(Request $request)
  {
    $blog = new Blog();

    $this->validate($request, [
      'title'=>'required',
      'category'=>'required',
      'description'=>'required',
      'featured_image'=>'required'
    ]);

    $press = $request->get('description');
    // dd($pressTxt);

    if ($request->hasFile('featured_image')) {
      $featured_image = $request->file('featured_image');
      $featureName = time().'.'.$featured_image->getClientOriginalExtension();
      $destinationPath = 'images';
      $blog->featured_image = $featured_image->move($destinationPath, $featureName);
      $blog->featured_image = '/'. $destinationPath . '/'. $featureName;
    }

    $slug = $request->get('title');;
    $slug = str_replace(' ', '-', $slug); // Replaces all spaces with hyphens.
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.

    $blog->title = $request->get('title');
    $blog->category = $request->get('category');
    $blog->status = $request->get('status');
    $blog->description = $press;
    $blog->slug = $slug;
    $blog->createBlog($request->all());

    return redirect('blog')->with('success', 'New blog has been created successfully :)');
  }

  public function update(Request $request, $id)
  {
    $blog = Blog::find($id);

    $this->validate($request, [
      'title'=>'required',
      'category'=>'required',
      'description'=>'required',
    ]);

    $press = $request->get('description');
    // dd($pressTxt);

    if ($request->hasFile('featured_image')) {
      $featured_image = $request->file('featured_image');
      $featureName = time().'.'.$featured_image->getClientOriginalExtension();
      $destinationPath = 'images';
      $blog->featured_image = $featured_image->move($destinationPath, $featureName);
      $blog->featured_image = '/'. $destinationPath . '/'. $featureName;
    }

    $slug = $request->get('title');;
    $slug = str_replace(' ', '-', $slug); // Replaces all spaces with hyphens.
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.

    $blog->title = $request->get('title');
    $blog->category = $request->get('category');
    $blog->status = $request->get('status');
    $blog->description = $press;
    $blog->slug = $slug;

    // dd($blog);

    $blog->save();

    return redirect('blog')->with('success', 'Article Updated Successfully :)');
  }

  public function edit($id)
  {
    $blogs = Blog::find($id);
    return view('blog.edit', compact('blogs'));
  }

  public function show($slug)
  {
    $blogs = \App\Blog::where('slug', $slug)->firstOrFail();
    $artists = Artists::all();
    $venues = Venue::all();
    $shows = Shows::all();
    $tickets = Tickets::with('shows')->where('ticketDate','>=',Carbon::now()->toDateString())->get()->sortBy('ticketDate');

    return view('blog.blogs',compact('blogs', 'shows', 'artists', 'tickets'));
  }

}
