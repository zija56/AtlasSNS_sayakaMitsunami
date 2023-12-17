<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['following_id','followed_id'];
    protected $table = 'follows';

    public function user(){
        return $this->hasMany('App\User');
    }

    // 「多対多」
    public function follows(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    public function followers(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }
}
