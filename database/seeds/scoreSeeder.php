<?php

use Illuminate\Database\Seeder;

class scoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('score')->insert([
            'name' => str_random(10),
            'score' => rand(1,10),
            'memo' => str_random(3)
        ]);
    }
}
