<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 09.03.2019
 * Time: 15:23
 */

namespace Project\Repositories;
use Project\Models\Article;

class ArticlesRepository extends Repository
{
    public function __construct(Article $articles)
    {
        $this->model = $articles;
    }
    public function get($select = '*',$take = false,$pagination = false){
        $result = parent::get($select,$take,$pagination);
        return $this->decodeJsonImg($result);
    }
}