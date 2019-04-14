<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 05.03.2019
 * Time: 19:13
 */

namespace Project\Libraries;


class MenuBuilder
{
    protected $items =[];


    public function getItems(array $array){
        $this->buildMenu($array);
        return $this->items;
    }
    protected function buildMenu (array $array){
        foreach ($array as $item){
            if ($item['parent'] === 0){
                $this->addItem($item);
            } else {
                $this->addChildren($item);
            }
        }
    }

    protected function addItem (array $array) {
        $this->items[$array['id']]=$array;
    }

    /**
     * @param array $array
     * @param mixed $key
     */
    protected function addChildren (array $array){
        $this->items[$array['parent']]['children'][$array['id']]=$array;
    }
}
