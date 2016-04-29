<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comment extends ORM
{
    protected $_table_name = 'comments';

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
}