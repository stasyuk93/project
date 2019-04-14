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
        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(FiltersSeeder::class);
        $this->call(PortfoliosSeeder::class);
        $this->call(MenusSeeder::class);
        $this->call(SlidersSeeder::class);
    }
}
