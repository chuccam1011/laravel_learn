<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id');
    }
}
