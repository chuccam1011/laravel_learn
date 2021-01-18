<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Profile extends Model
{
    //
    public function user()
    {
//       return $this->hasOne('App\User', 'id', 'user_id');
       return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
