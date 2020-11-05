<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public function getSubtext()
    {
        return $this->hasMany('App\Models\Subtext','title_id','id');
    }}
