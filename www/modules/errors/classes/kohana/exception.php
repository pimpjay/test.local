<?php

defined('SYSPATH') or die('No direct script access.');

class Kohana_Exception extends Kohana_Kohana_Exception {

    public static function handler(Exception $e)
    {
	if (Kohana::$environment === Kohana::DEVELOPMENT)
	{
	    // Use native kohana handler for DEVELOPMENT
	    parent::handler($e);
	}
	else
	{
	    try
	    {
		// Create a text version of the exception
		$error = Kohana_Exception::text($e);

		if (is_object(Kohana::$log))
		{
		    // Add this exception to the log
		    Kohana::$log->add(Log::ERROR, $error);

		    $strace = Kohana_Exception::text($e)."\n--\n".$e->getTraceAsString();
		    Kohana::$log->add(Log::STRACE, $strace);

		    // Make sure the logs are written
		    Kohana::$log->write();
		}

		if (Kohana::$is_cli)
		{
		    // Just display the 'ERROR' message
		    echo "\nERROR\n";
		    exit(1);
		}

		$status = $e instanceof HTTP_Exception ? $e->getCode() : 500;

		if (!Kohana::find_file('views'.DIRECTORY_SEPARATOR.'errors', $status))
		{
		    // default status, if view for status isn't defined
		    $status = 404;
		}

		if (!headers_sent())
		{
		    // Make sure the proper http header is sent
		    header('Content-Type: '.Kohana_Exception::$error_view_content_type.'; charset='.Kohana::$charset, TRUE, $status);
		}

		if (Request::current()->is_ajax() === TRUE)
		{
		    // Just display the 'ERROR' message
		    echo 'ERROR';
		}
		else
		{
		    // Render and echo view according to status
		    echo View::factory('errors'.DIRECTORY_SEPARATOR.$status)->render();
		}
		exit(1);
	    }
	    catch (Exception $e)
	    {
		// Clean the output buffer if one exists
		ob_get_level() and ob_clean();

		// Display the exception text
		echo parent::text($e);

		// Exit with an error status
		exit(1);
	    }
	}
    }

}