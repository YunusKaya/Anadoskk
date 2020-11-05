<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    public function getFollows()
    {
        return $this->hasMany('App\Models\Follow','writer_id','id');
    }
    public function getArticle()
    {
        return $this->hasMany('App\Models\Article','writer_id','id');
    }
}
