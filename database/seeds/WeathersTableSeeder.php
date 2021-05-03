<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeathersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weathers')->insert([
        [
          'id' => 1,
          'name' => '晴れ',
        ],
        [
          'id' => 2,
          'name' => '曇り',
        ],
        [
          'id' => 3,
          'name' => '雨',
        ],
      ]);
    }
}
