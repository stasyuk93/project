<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'title'=>'Блог',
                    'alias'=>'blog',
                    'parent_id'=>0,
                ],
                [
                    'title'=>'Компьютеры',
                    'alias'=>'computers',
                    'parent_id'=>1,
                ],
                [
                    'title'=>'Интересное',
                    'alias'=>'interesting',
                    'parent_id'=>1,
                ],
                [
                    'title'=>'Советы',
                    'alias'=>'advice',
                    'parent_id'=>1,
                ],
            ]
        );
    }
}
