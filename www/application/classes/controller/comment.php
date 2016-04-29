<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Comment extends Controller
{
     public function action_delete()
    {
        $id = $this->request->param('id');

        $comment = ORM::factory('comment')
            ->where('id', '=', $id)
            ->find();

        $post_id = $comment->post_id;

        if ( ! $comment->loaded())
        {
            throw new HTTP_Exception_404;
        }

        $comment->delete();
        $this->request->redirect('/post/view/'.$post_id);
    }
}