<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");

        DB::table('users')->delete();
        DB::table('auctions')->delete();
        DB::table('biddings')->delete();

        DB::statement('ALTER TABLE users AUTO_INCREMENT = 0');
        DB::statement('ALTER TABLE auctions AUTO_INCREMENT = 0');
        DB::statement('ALTER TABLE biddings AUTO_INCREMENT = 0');
        
        DB::statement("SET foreign_key_checks=1");

        $this->call(UsersSeeder::class);
        $this->call(AuctionsSeeder::class);
        $this->call(BiddingsSeeder::class);
    }
}
