<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ligue extends Model
{
    //the table associate

    protected $table = 'ligue';

    //the primary key of the table
    protected $primaryKey = 'NumLigue';

    //Indicate if the primary Key is a auto-incrementing
    public $incrementing = false;

    public $timestamps = false;
}
