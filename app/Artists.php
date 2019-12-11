<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artists extends Model
{
  public function shows()
  {
    return $this->hasMany('Shows::class');
  }
  protected $fillable = [
    'name',
    'featured_image',
    'bio',
  ];
}
