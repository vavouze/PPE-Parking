<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LigueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Ligues')->insert(array(
            'NumLigue'=>'0001',
            'Nom' => 'ligue de basket',
            'AdresseRue' => Str::random(10),
            'CP' => '78770',
            'Ville' => 'paris',
        ));
    }
}
