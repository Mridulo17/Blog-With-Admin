<?php

namespace App\Models\Model\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany('App\Models\Model\user\post','category_posts')->orderBy('created_at','DESC')->paginate(5);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
