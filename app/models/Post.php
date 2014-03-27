<?php

class Post extends \Eloquent {
    protected $fillable = ['post', 'masked', 'hidden', 'post_by', 'post_for'];
    

    public function user(){
    	return $this->belongsTo('User', 'post_for');
    }
}