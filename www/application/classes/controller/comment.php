<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Comment extends Controller_Common
{
    public function action_delete()
    {
        $id = $this->request->param('id');

        $comment = ORM::factory('comment', $id);

        if ( ! $comment->loaded())
        {
            throw new HTTP_Exception_404;
        }
        $post_id = $comment->post->id;
        $comment->delete();
        $this->request->redirect(Route::url('default', array(
            'controller'   => 'post',
            'action'       => 'view',
            'id'           => $post_id
        )));
    }
}