<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Описание
 *
 * @package    project
 * @copyright  15web.ru
 */

return array(
    'default' => array(
        'baseDir' => APPPATH, //коневой путь
        'templateDir' => 'views',//тут шаблоны
        'compileDir' => 'cache/smarty_compile',//здесь то что компилит смарти
        'compile_check' => TRUE, //проверка на наличие изменений.
    )
);


