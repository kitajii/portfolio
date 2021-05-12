<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->insert([
        [
            'id' => 1,
            'name' => '北島和希',
            'email' => 'kazu.rmcf@gmail.com',
            'password' => \Hash::make('kazu9529'),
        ],
      ]);
      }
}