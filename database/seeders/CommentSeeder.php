<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 13; $i++) {
            $date = date('Y-m-d H:i:s');
            DB::table('comments')->insert([
                'user_id' => random_int(1, 10),
                'post_id' => 1,
                'parent_id' => 1,
                'body' => Str::random(50),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
