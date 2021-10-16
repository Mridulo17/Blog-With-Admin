<?php

namespace App\Models\Model\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Model\admin\Permission');
    }
}
