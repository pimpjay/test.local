<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Common extends Controller {
    
    /** @var Smarty */
    protected $smarty;
    /** @var  Model_User|NULL */
    protected $user = NULL;
    
    public function before()
    {
        parent::before();

        if(Auth::instance()->logged_in())
        {
            $this->user = Auth::instance()->get_user();
            echo 'Hello, '.$this->user->username;
        }

        $this->smarty = Service_Smarty::factory();
    }
}
