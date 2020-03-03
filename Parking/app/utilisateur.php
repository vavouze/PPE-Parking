<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{



    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'utilisateur';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'IDpersonne';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    public $timestamps = false;

    public function listeattente()
    {
        return $this->hasOne('App\listeattente', 'IDpersonne');
    }

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';


}
