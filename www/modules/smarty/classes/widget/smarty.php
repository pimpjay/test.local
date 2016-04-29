<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Базовый класс виджета поддерживающий шаблонизатор
 *
 * @package
 * @copyright  15web.ru
 */
abstract class Widget_Smarty extends Widget {

    // smarty
    protected $smarty;

    /*
     * Инициализацияв виджета
     */

    public function init()
    {

         $this->smarty = Service::factory('smarty');
    }

}