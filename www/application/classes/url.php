<?php defined('SYSPATH') or die('No direct script access.');

class URL extends Kohana_URL
{
    public static function admin_comment_delete($comment)
    {
        return Route::url('admin', array(
            'directory'  => 'admin',
            'controller' => 'comment',
            'action'     => 'delete',
            'id'         => $comment->id
        ));
    }

    public static function admin()
    {
        return Route::url('admin', array(
            'directory'     =>  'admin',
            'controller'    =>  'main',
            'action'        =>  'index'
        ));
    }

    public static function admin_post_create(/*$post*/)
    {
        return Route::url('admin', array(
            'directory'  => 'admin',
            'controller' => 'post',
            'action'     => 'create'/*,
            'id'         => $post->id*/
        ));
    }

    public static function admin_post_delete($post)
    {
        return Route::url('admin', array(
            'directory'  => 'admin',
            'controller' => 'post',
            'action'     => 'delete',
            'id'         => $post->id
        ));
    }
    
    public static function admin_post_update($post)
    {
        return Route::url('admin', array(
            'directory'  => 'admin',
            'controller' => 'post',
            'action'     => 'update',
            'id'         => $post->id
        ));
    }
    
    public static function admin_post($post)
    {
        return Route::url('admin', array(
            'directory'  => 'admin',
            'controller' => 'post',
            'action'     => 'view',
            'id'         => $post->id
        ));
    }
    
    public static function post($post)
    {
        return Route::url('default', array(
            'controller' => 'post',
            'action'     => 'view',
            'id'         => $post->id
        ));
    }

    public static function login()
    {
        return Route::url('auth', array(
            'controller' => 'auth',
            'action'     => 'login'
        ));
    }

    public static function logout()
    {
        return Route::url('auth', array(
            'action'     => 'logout'
        ));
    }

    public static function registration()
    {
        return Route::url('registration', array(
           'controller'  => 'registration',
            'action'     => 'form'
        ));
    }
}
