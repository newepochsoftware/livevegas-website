<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shows extends Model
{
  public function tickets()
  {
    return $this->hasMany(Tickets::class)->where('ticketDate', '>=', Carbon::now('PST'))->orderBy('ticketDate', 'asc');
  }
  public function artists()
  {
    return $this->belongsTo(Artists::class);
  }
  public function venues()
  {
    return $this->belongsTo(Venue::class);
  }
  public function latestTickets()
  {
    return $this->hasOne(Tickets::class)->where('ticketDate', '>=', Carbon::now('PST'))->orderBy('ticketDate', 'asc');
  }
  public function nextTickets()
  {
    return $this->hasOne(Tickets::class);
  }
  protected $fillable = [
    'name',
    'artists_id',
    'hero',
    'featured_image',
    'video',
    'eventStatus',
    'price',
    'description',
    'venues_id',
    'type',
    'startDate',
    'availabilityStarts',
    'slug'
  ];
}
