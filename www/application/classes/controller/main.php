<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Common
{
    public function action_index()
    {
        $posts = ORM::factory('post')->find_all();

        $this->smarty->assign(array(
            'posts' => $posts
        ));

        $this->smarty->display('main/index.tpl');
    }
}