<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = "Julius Caesar, in full Gaius Julius Caesar, (born July 12/13, 100? BCE, Rome [Italy]—died March 15, 44 BCE, Rome), celebrated Roman general and statesman, the conqueror of Gaul (58–50 BCE), victor in the civil war of 49–45 BCE, and dictator (46–44 BCE), who was launching a series of political and social reforms when he was assassinated by a group of nobles in the Senate House on the Ides of March.";

        $date = date('Y-m-d H:i:s');

        DB::table('posts')->insert([
            'title' => 'Gaius Julius Caesar',
            'body' => $body,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
