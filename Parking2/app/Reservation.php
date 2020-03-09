<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $table = 'Reservation';
  protected $primareyKey = 'NumReservation';
  public $incrementing = false;
  public $timestamps = false;
}
