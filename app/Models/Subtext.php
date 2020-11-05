<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtext extends Model
{
    public function getTitle()
    {
        return $this->hasOne('App\Models\Title','id','title_id');
    }}
