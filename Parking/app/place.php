<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class place extends Model
{
    //the table associate

    protected $table = 'place';

    //the primary key of the table
    protected $primaryKey = 'NumPlace';

    //Indicate if the primary Key is a auto-incrementing
    public $incrementing = false;

    public $timestamps = false;
}
