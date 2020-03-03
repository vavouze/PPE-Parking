<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListeAttente extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listeattente';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'Rang';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
