<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Описание
 *
 * @package    IM
 * @copyright  15web.ru
 */
class Service {

    public static function factory($name, $params = array())
    {
        // Add the service prefix
        $class = 'Service_'.UTF8::ucfirst($name);

        //если в классе определена фабрика, то вызываем её
        try
        {
            $method = new ReflectionMethod($class, 'factory');
            $service = $method->invokeArgs(NULL, $params);
        }
        catch (Exception $e)
        {
            $service = new $class;
        }

        return $service;
    }

}

