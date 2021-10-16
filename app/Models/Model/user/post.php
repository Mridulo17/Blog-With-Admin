<?php

namespace App\Models\Model\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Model\user\tag','post_tags')->withTimestamps();
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\Model\user\category','category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
