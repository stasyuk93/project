<?php

use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(
            [
                [
                    'title'=>'Главная',
                    'path'=>'/',
                    'parent'=>0,
                ],
                [
                    'title'=>'Блог',
                    'path'=>'/articles',
                    'parent'=>0,
                ],
                [
                    'title'=>'Компьютеры',
                    'path'=>'/articles/category/computers',
                    'parent'=>2,
                ],
                [
                    'title'=>'Интересное',
                    'path'=>'/articles/category/interesting',
                    'parent'=>2,
                ],
                [
                    'title'=>'Советы',
                    'path'=>'/articles/category/advice',
                    'parent'=>2,
                ],
                [
                    'title'=>'Портфолио',
                    'path'=>'/portfolios',
                    'parent'=>0,
                ],
                [
                    'title'=>'Контакты',
                    'path'=>'/contacts',
                    'parent'=>0,
                ],
            ]
        );
    }
}
