<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comment extends ORM
{
    protected $_table_name = 'comments';

    protected $_belongs_to = array(
        'post' => array(
            'model'       => 'post',
            'foreign_key' => 'post_id' // изучить
        ),
    );
    
    public function filters()
    {
        return array(
            TRUE => array(
                array('trim'),
                array('strip_tags'),
            )
        );
    }

    public function rules()
    {
        return array(
            'user' => array(
                array('not_empty')
            ),
            'message' => array(
                array('not_empty')
            ),
        );
    }

    public function labels ()
    {
        return array(
            'user'         =>  'Пользователь',
            'message'      =>  'Сообщение'
        );
    }

    public function title_filled($username)
    {
        return ORM::factory('member', array('username' => $username))->loaded();
    }
}