<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 03.03.2019
 * Time: 13:20
 */

namespace Project\Repositories;
use Illuminate\Config;

abstract class Repository
{
    /**
     * @var object $model
     * */
    protected $model = false;

    /**
     * @return object
     * */
    public function get($select = '*',$take = false,$pagination = false){
        $builder = $this->model->select($select);
        if($take) $builder->take($take);
        if($pagination) return $builder->paginate($pagination);
        return $builder->get();
    }
    protected function decodeJsonImg($result){
        if($result->isEmpty()){
            return false;
        }
        $result->transform(function ($item,$key){
            $item->img = json_decode($item->img);
            return $item;
        });
        return $result;
    }

}