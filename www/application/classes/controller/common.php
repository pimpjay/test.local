<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Common extends Controller {
    
    /** @var Smarty */
    protected $smarty;
    
    public function before()
    {
        parent::before();
       
        $this->smarty = Service_Smarty::factory();
    }
}
