<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Common
{
    public function action_login()
    {
        $errors = array();       

        if ($this->request->post())
        {
            $email = $this->request->post('email');
            $password = $this->request->post('password');

            if (Auth::instance()->login($email, $password))
            {
                $this->request->redirect('admin_main');
            }
            else
            {
                $errors['login_error'] = TRUE; ///довести до ума!!!!!!!!!!!!!!!!!!!!!!!
            }
        }
        $this->smarty->assign(array('errors' => $errors));
        $this->smarty->display('auth/login.tpl');
    }

    public function action_logout()
    {
        if ($this->user)
        {
            Auth::instance()->logout();

            $this->request->redirect(Route::url('default'));
        }
        else
        {
            throw new HTTP_Exception_404;
        }
    }
}