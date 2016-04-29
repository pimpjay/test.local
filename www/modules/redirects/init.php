<?php

defined('SYSPATH') or die('No direct script access.');

if( ! Kohana::$is_cli)
{
    $request_uri = rtrim($_SERVER['REQUEST_URI'], '/');

    $active_redirect = ORM::factory('redirect')
                          ->where('redirect.url_from', '=', $request_uri)
                          ->find();

    if ($active_redirect->loaded())
    {
        header('Location: '.$active_redirect->url_to, TRUE, 301);
        exit;
    }

    unset($request_uri, $active_redirect);
}