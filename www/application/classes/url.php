<?php defined('SYSPATH') or die('No direct script access.');

class URL extends Kohana_URL
{
    public static function post($post)
    {
        return Route::url('default', array(
            'controller' => 'post',
            'action'     => 'view',
            'id'         => $post->id 
        ));    
    }  
}