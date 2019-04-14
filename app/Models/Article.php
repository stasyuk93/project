<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 09.03.2019
 * Time: 15:22
 */

namespace Project\Models;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
        return $this->belongsTo('Project\Models\User');
    }

    public function category(){
        return $this->belongsTo('Project\Models\Category');
    }

    public function comments(){
        return $this->hasMany('Project\Models\Comment');
    }
}