<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Table Name
    protected $table = 'events';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->hasMany('App\EventLike');
    }
}
