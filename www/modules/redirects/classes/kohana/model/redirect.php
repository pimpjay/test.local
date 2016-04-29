<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Запись, хранящая редирект.
 */
class Kohana_Model_Redirect extends Model_Base {

    protected $_table_name = 'redirects';

    public function labels()
    {
        return array(
            'url_from' => 'Откуда',
            'url_to'   => 'Куда',
        );
    }

    public function rules()
    {
        return array(
            'url_from' => array(
                array('not_empty'),
                // Имеет смысл принимать только relative URI absolute PATH (/foo/bar).
                array('regex', array(':value', '/^\//')),
                array(array($this, 'unique'), array(':field', ':value')),
                // Не позволяем создавать связанные записи во избежание возможной цикличности.
                array(array($this, 'nonchained'), array(':value', 'url_to')),
            ),
            'url_to'   => array(
                // А здесь путь может быть любым.
                array('not_empty'),
                array(array($this, 'noncyclic_self'), array(':value', 'url_from')),
            ),
        );
    }

    public function filters()
    {
        return array(
            'url_from' => array(
                array('Filter::url_path'),
                array('rtrim', array(':value', '/'))
            ),
        );
    }

    /**
     * Проверить редирект на нецикличность внутри себя.
     * @param string $value
     * @param string $field
     * @return boolean
     */
    public function noncyclic_self($value, $field)
    {
        return trim($value, '/') !== trim($this->{$field}, '/');
    }

    /**
     * Проверить поле на отсутствие связей с другими редиректами.
     * @param string $value
     * @param string $field
     * @return boolean
     */
    public function nonchained($value, $field)
    {
        // Попытка привести это к виду absolute URI.
        $absolute = Valid::url($value) ? $value : URL::site($value, TRUE, TRUE);
        // Приведение к relative URI absolute PATH.
        $rel_uri_abs_path = URL::site($value);
        // Приведение к relative URI relative PATH.
        $rel_uri_rel_path = ltrim($rel_uri_abs_path, '/');

        // Ищем связанную по этим адресам запись.
        return ! ORM::factory($this->object_name())
                ->where($this->object_name().'.'.$field, 'IN', array(
                    $absolute, $rel_uri_abs_path, $rel_uri_rel_path
                ))->count_all();
    }

}
