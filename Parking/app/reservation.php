<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    //the table associate

    protected $table = 'reservation';

    //the primary key of the table
    protected $primaryKey = 'NumReservations';

    //Indicate if the primary Key is a auto-incrementing
    public $incrementing = false;

    public $timestamps = false;
}
