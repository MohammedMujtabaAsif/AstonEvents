<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLike extends Model
{
    // Table Name
    protected $table = 'likeCounter';
    //Primary Key
    protected $guarded = ['id'];
    //Timestamps
    public $timestamps = false;

    public function status(){
    return $this->hasOne('App\Event');
    }

    public function userStatus(){
        return $this->hasOne('App\User');
    }

}
