<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 08.03.2019
 * Time: 15:33
 */

namespace Project\Repositories;
use Project\Models\Portfolio;

class PortfolioRepository extends Repository
{
    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }
    public function get($select = '*',$take = false,$pagination = false){
        $result = parent::get($select,$take,$pagination);
        return $this->decodeJsonImg($result);
    }

}