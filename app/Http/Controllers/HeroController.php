<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Hero;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $hero = Hero::all();

      return view('hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('hero.create', compact('hero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $hero = new Hero();

        if ($request->hasFile('featured_image')) {
          $featured_image = $request->file('featured_image');
          $featureName = time().'.'.$featured_image->getClientOriginalExtension();
          $destinationPath = 'images';
          $hero->image = $featured_image->move($destinationPath, $featureName);
          $hero->image = '/'. $destinationPath . '/'. $featureName;
        }

        $hero->link = $request->get('url_link');
        $hero->alt = $request->get('alt_Tag');
        $hero->hero_order = $request->get('hero_order');

        // dd($hero);

        $hero->save();
        return redirect('/hero')->with('success', 'A New Hero Image Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $hero = Hero::find($id);

      return view('hero.edit', compact('hero'));
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
      $hero = Hero::find($id);
      $hero->delete();

      return redirect('/hero')->with('success', 'Hero Image has been deleted');
    }
}
