<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Описание
 *
 * @package    project
 * @copyright  15web.ru
 */
Class Service_Smarty {

    public static $singleton = array();
    protected $_smarty;
    protected $_config;

    public function __construct($config)
    {
        require_once MODPATH.'smarty/vendor/smarty/libs/Smarty.class.php';

        $this->_config = Kohana::$config->load('smarty.'.$config);
        
        $baseDir = Arr::get($this->_config, 'baseDir');
        $templateDir = Arr::get($this->_config, 'templateDir');
        $compileDir = Arr::get($this->_config, 'compileDir');

        $this->_smarty = new Smarty();
        $this->_smarty->compile_check = Arr::get($this->_config, 'compile_check', FALSE);  // проверка на наличие изменений.
        $this->_smarty->setTemplateDir($baseDir.$templateDir);
        $this->_smarty->setCompileDir($baseDir.$compileDir);
    }

    public static function factory($config = 'default')
    {
        if (!Arr::get(self::$singleton, $config, FALSE))
        {
            self::$singleton[$config] = new Service_Smarty($config);
        }
        return self::$singleton[$config]->smarty();
    }

    public function smarty()
    {
        return $this->_smarty;
    }

}

