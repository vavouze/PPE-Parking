<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listeattente extends Model
{
    //the table associate

    protected $table = 'listeattente';

    //the primary key of the table
    protected $primaryKey = 'Rang';

    //Indicate if the primary Key is a auto-incrementing
    public $incrementing = false;

    public $timestamps = false;
}
