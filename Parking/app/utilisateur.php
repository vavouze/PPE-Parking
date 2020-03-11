<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    //the table associate

    protected $table = 'utilisateur';

    //the primary key of the table
    protected $primaryKey = 'IDpersonne';

    //Indicate if the primary Key is a auto-incrementing
    public $incrementing = false;

    public $timestamps = false;

    public function listeattente()
    {
        return $this->hasMany('listeattente');
    }
}
