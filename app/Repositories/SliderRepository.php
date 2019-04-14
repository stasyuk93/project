<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 06.03.2019
 * Time: 17:13
 */

namespace Project\Repositories;
use Project\Models\Slider;

class SliderRepository extends Repository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }
}