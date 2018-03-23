<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Comment extends Model
{
    // Table name
    protected $table = 'comments';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;


    public function post(){
        return $this->belongsTo('App\Post','post_id');
    }

    public function ownerUser(){
        return $this->belongsTo('App\User','owner_user_id','id');
    }

    public function targetUser(){
        return $this->belongsTo('App\User','target_user_id','id');
    }

    
 

}
