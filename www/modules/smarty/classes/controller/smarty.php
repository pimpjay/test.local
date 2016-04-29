<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Smarty extends Controller {
    
    protected $smarty;
    
    public function before() {
        parent::before();
        
        require_once MODPATH.'smarty/vendor/smarty/libs/Smarty.class.php';
        
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(APPPATH.'views');
        $this->smarty->setCompileDir(APPPATH.'cache/smarty_compile');                
//        $this->smarty->setCacheDir(APPPATH.'cache/smarty_cache');
//        $this->smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);        
//        $this->smarty->setCacheLifetime(5);
    }
    
}




?>
