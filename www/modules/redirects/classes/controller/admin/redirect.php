<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Список редиректов.
 *
 * @package
 * @author     15web.ru
 */
class Controller_Admin_Redirect extends Controller_Admin_System_Page {

    protected $_template_directory = '';
    protected $title = 'Список редиректов';
    protected $edit_subtitle = 'Редактирование редиректа';
    protected $create_subtitle = 'Создание редиректа';
    protected $_default_model_name = 'redirect';
    protected $_default_form_model_name = 'redirect';

    protected function columns()
    {
        return array(
            'url_from' => array(
                'link'            => TRUE,
                'as_href'         => TRUE,
                'href_attributes' => array(
                    'target' => '_blank',
                ),
            ),
            'url_to'   => array(
                'link'            => TRUE,
                'as_href'         => TRUE,
                'href_attributes' => array(
                    'target' => '_blank',
                ),
            ),
        );
    }

    protected function filters()
    {
        return array(
            'url_from' => array(
                'type' => 'text',
            ),
            'url_to'   => array(
                'type' => 'text',
            ),
        );
    }

    protected function form_fields()
    {
        return array(
            'url_from' => array(
                'type' => 'text',
            ),
            'url_to'   => array(
                'type' => 'text',
            ),
        );
    }

    protected function filter_search_item($type, $key, $item)
    {
        if ($type == 'text' AND in_array($key, array('url_from')))
        {
            $item = ltrim(Filter::url_path($item), '/');
        }

        return $item;
    }

}
