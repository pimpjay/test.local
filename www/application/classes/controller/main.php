<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Common
{
    public $admin_button = array();

    public function action_index()
    {
        $posts = ORM::factory('post')
            ->order_by('id', 'desc')
            ->find_all();

        if(Auth::instance()->logged_in())
        {
            
            $this->admin_button ['admin_button'] = TRUE;
        }

        $this->smarty->assign(array(
            'posts'         => $posts,
            'admin_button'  => $this->admin_button
        ));

        $this->smarty->display('main/index.tpl');
    }
}