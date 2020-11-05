<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    public function getArticle()
    {
        return $this->hasOne('App\Models\Article','id','articles_id');
    }
}
