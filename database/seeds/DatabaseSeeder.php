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
        // $this->call(UsersTableSeeder::class);
        $this->call(Tlist_acreditationSeeder::class);
        $this->call(Tlist_groupe_userSeeder::class);
        $this->call(Tlist_messageSeeder::class);
        $this->call(Tlist_operationSeeder::class);
    }
}
