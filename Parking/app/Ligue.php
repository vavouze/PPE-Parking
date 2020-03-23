<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligue extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ligues';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'Numligue';


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
