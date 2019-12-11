<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
  protected $fillable = [
    'image',
    'link',
    'hero_order',
    'alt'
  ];
}
