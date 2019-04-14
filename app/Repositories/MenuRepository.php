<?php
namespace Project\Repositories;

use Project\Models\Menu;

class MenuRepository extends Repository {
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

}