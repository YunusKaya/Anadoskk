<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function getCategory()
    {
        return $this->hasOne('App\Models\category','id','category_id');
    }

    public function getWriters()
    {
        return $this->hasOne('App\Models\Users','id','writer_id');
    }

    public function getCountLike()
    {
        return $this->hasMany('App\Models\LikeDislike','articles_id','id')->where('statu','=','1');
    }
    public function getCountDislike()
    {
        return $this->hasMany('App\Models\LikeDislike','articles_id','id')->where('statu','=','0');
    }
}
