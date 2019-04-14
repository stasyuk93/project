<?php

namespace Project\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function filter(){
        return $this->belongsTo('Project\Models\Filter','filter_alias','alias');

    }
}
