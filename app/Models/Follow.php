<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function getWriter()
    {
        return $this->hasOne('App\Models\Users','id','writer_id');
    }
}
