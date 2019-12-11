<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
  public function shows()
  {
    return $this->hasMany('App\Shows');
  }
  protected $fillable = [
    'name',
    'address',
    'city',
    'state',
    'zip',
    'thumb',
    'map_embed'
  ];
}
