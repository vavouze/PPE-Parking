<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
  protected $table = 'Utilisateur';
  protected $primareyKey = 'IDpersonne';
  public $incrementing = false;
  public $timestamps = false;
}
