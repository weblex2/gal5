<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_articles')->insert([
            'arnr' => Str::random(10),
            'string' => Str::random(10).'@gmail.com',
            'active' => Integer::make('password'),
        ]);
    }
}
