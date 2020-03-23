<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'IDpersonne'=>Str::random(4),
            'Nom' => Str::random(10),
            'Prenom' => Str::random(10),
            'Tel' => Str::random(10),
            'AdRue' => Str::random(10),
            'CP' => '78770',
            'Ville' => 'paris',
            'Mail' => Str::random(10).'@gmail.com',
            'Etat' => 0,
            'IdLigue' => '0001',
            'MotDePasse' => Hash::make('113'),
        ));
    }
}
