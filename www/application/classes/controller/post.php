<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Common
{
    public function action_view()
    {
        $id = $this->request->param('id');

        $errors = array();
        $post = ORM::factory('post')
            ->where('id', '=', $id)
            ->find();
        
        if (!$post->loaded())
        {
            throw new HTTP_Exception_404;
        }
        $comment = ORM::factory('comment')
            ->where('post_id', '=', $id)
            ->find_all();
        $new_comment = ORM::factory('comment');

        if ($this->request->post())
        {
            $new_comment->post_id = $id;
            $new_comment->values($this->request->post());

            try
            {
                $new_comment->save();
                $this->request->redirect(URL::site('/post/view/'.$id));
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors($e->alias());
            }
        }
        
        $user_error = Arr::get($errors, 'user', $default = NULL);
        $message_error = Arr::get($errors, 'message', $default = NULL);
        
        $this->smarty->assign(array(
            'post'          => $post,
            'comments'      => $comment,
            'errors'        => $errors,
            'user_error'    => $user_error,
            'message_error' => $message_error
        ));
        $this->smarty->display('post/view.tpl');
    }
    
    public function action_create()
    {
        $post = ORM::factory('post');
        $errors = array();

        if ($this->request->post())
        {
            $post->values($this->request->post());

            try
            {
                $post->save();
                $this->request->redirect(URL::site('/'));
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors($e->alias());
            }
        }
        
        $title_error = Arr::get($errors, 'title', $default = NULL);
        $author_error = Arr::get($errors, 'author', $default = NULL);
        $content_error = Arr::get($errors, 'content_full', $default = NULL);

        $this->smarty->assign(array(
            'post'          => $post,
            'errors'        => $errors,
            'title_error'   => $title_error,
            'author_error'  => $author_error,
            'content_error' => $content_error
        ));

        $this->smarty->display('post/create.tpl');
    }

    public function action_update()
    {
        $id = $this->request->param('id');

        $errors = array();

        $post = ORM::factory('post')
            ->where('id', '=', $id)
            ->find();

        if ($this->request->post())
        {
            $post->values($this->request->post());

            try
            {
                $post->save();
                $this->request->redirect(URL::post($post));
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors($e->alias());
            }
        }

        $title_error = Arr::get($errors, 'title', $default = NULL);
        $author_error = Arr::get($errors, 'author', $default = NULL);
        $content_error = Arr::get($errors, 'content_full', $default = NULL);

        $this->smarty->assign(array(
            'post'          => $post,
            'errors'        => $errors,
            'title_error'   => $title_error,
            'author_error'  => $author_error,
            'content_error' => $content_error
        ));

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
        $this->request->redirect('/');
    }
}