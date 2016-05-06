<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Main extends Controller_Common
{

    public $admin_button = array();
    
    public function action_index()
    {
        $posts = ORM::factory('post')
            ->order_by('id', 'desc')
            ->find_all();


        $this->admin_button ['admin_button'] = TRUE;

        $this->smarty->assign(array(
            'admin_button' => $this->admin_button,
            'posts'        => $posts
        ));

        $this->smarty->display('admin/main.tpl');
//        if (Auth::instance()->logged_in())
//        {
//
//        }
//        else
//        {
//            throw new HTTP_Exception_403;
//        }
    }    
}