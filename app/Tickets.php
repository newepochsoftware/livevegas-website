<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
  public function shows()
  {
    return $this->belongsTo(Shows::class);
  }
  public function artists()
  {
    return $this->belongsTo(Artists::class);
  }
  public function venues()
  {
    return $this->belongsTo(Venue::class);
  }
  protected $fillable = [
    'shows_id',
    'ticketDate',
    'ticket_url'
  ];
}
