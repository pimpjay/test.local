<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Post extends Controller_Common
{
    public function action_view()
    {
        $id = $this->request->param('id');

        $errors = array();

        /** @var Model_Post $post */
        $post = ORM::factory('post', (int)$id);

        if ( ! $post->loaded())
        {
            throw new HTTP_Exception_404;
        }
        $post->increment_view_count();

        $new_comment = ORM::factory('comment');

        if ($this->request->post())
        {
            $new_comment->post_id = $id;
            $new_comment->values($this->request->post());

            try
            {
                $new_comment->save();
                $this->request->redirect(Route::url('admin', array(
                    'directory'    => 'admin',
                    'controller'   => 'post',
                    'action'       => 'view',
                    'id'           => $id
                )));
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors($e->alias());
            }
        }

        $this->smarty->assign(array(
            'new_comment'   => $new_comment,
            'post'          => $post,
            'comments'      => $post->comments->order_by('id', 'desc')->find_all(),// изучить
            'errors'        => $errors
        ));
        $this->smarty->display('admin/post/view.tpl');
    }

    public function action_create()
    {
        /** @var Model_Post $post */
        $post = ORM::factory('post');

        $this->post_handler($post);

        $this->smarty->display('post/create.tpl');
    }

    public function action_update()
    {
        $id = $this->request->param('id');

        /** @var Model_Post $post */
        $post = ORM::factory('post')
            ->where('id', '=', $id)
            ->find();

        if ( ! $post->loaded())
        {
            throw new HTTP_Exception_404;
        }

        $this->post_handler($post);

        $this->smarty->display('post/create.tpl');
    }

    public function action_delete()
    {
        $id = $this->request->param('id');

        $post = ORM::factory('post', $id);

        if ( ! $post->loaded())
        {
            throw new HTTP_Exception_404;
        }

        $post->delete();
        $this->request->redirect(Route::url('admin'));
    }

    /**
     * @param $post
     */
    protected function post_handler(Model_Post $post)
    {
        $errors = array();

        if ($this->request->post())
        {
            $post->values($this->request->post());

            try
            {
                $post->save();
                $id = $post->id;
                $this->request->redirect(Route::url('admin_post', array(
                    'directory'     =>  'admin',
                    'controller'    =>  'post',
                    'action'        =>  'view',
                    'id'            =>  $id
                )));
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors($e->alias());
            }
        }

        $this->smarty->assign(array(
            'post' => $post,
            'errors' => $errors,
        ));
    }
}