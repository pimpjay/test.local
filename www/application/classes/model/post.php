<?php defined('SYSPATH') or die('No direct script access.');

class Model_Post extends ORM
{    
    protected $_table_name = 'posts';

    protected $_has_many = array(
        'comments'    => array(
            'model'       => 'comment',
            'foreign_key' => 'post_id', // изучить
        )
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
            'title' => array(                
                array('not_empty')
            ),
            'author' => array(                
                array('not_empty')
            ),
            'content_full' => array(
                array('not_empty')
            ),
        );
    }

    public function labels ()
    {
        return array(
            'title'         =>  'Заголовок',
            'author'        =>  'Автор',
            'content_full'  =>  'Сообщение'
        );
    }

    public function increment_view_count()
    {
        $this->views = $this->views + 1;
        $this->save();
    }
}