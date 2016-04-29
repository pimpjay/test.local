<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * 
 *
 * @package    
 * @copyright  15web.ru
 */
class Kohana_Model_File extends Model_Base {

    protected $_table_name = 'files';
    protected $_belongs_to = array(
        'user' => array(
            'model' => 'user'
        ),
    );

    public function labels()
    {
        return array(
            'original_name' => 'Оригинальное имя',
            'filesize'      => 'Размер файла',
            'mime_type'     => 'Тип файла',
            'created'       => 'Дата создания файла',
            'user_id'       => 'Пользователь',
        );
    }

    /**
     * Вернуть путь к файлу
     * @return string путь к картинке
     */
    public function get_path()
    {
        return $this->path;
    }

}
