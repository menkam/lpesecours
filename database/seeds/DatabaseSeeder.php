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
        $this->call(Tlist_acreditationSeeder::class);
        $this->call(Tlist_groupe_userSeeder::class);
        $this->call(Tlist_messageSeeder::class);
        $this->call(Tlist_operationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MessageSeeder::class);
        //$this->call(Oper_user_mesSeeder::class);
        $this->call(Galerie_images_accueilSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(Tlist_ope_gestionSeeder::class);
        $this->call(Tlist_cachetSeeder::class);
        $this->call(Tlist_photoSeeder::class);

        $this->call(MoMoSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(CachetSeeder::class);
    }
}