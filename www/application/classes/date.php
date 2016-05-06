<?php defined('SYSPATH') or die('No direct script access.');

class Date extends Kohana_Date
{
    public static function fuzzy_span($timestamp, $local_timestamp = NULL)
    {
        $parent = parent::fuzzy_span($timestamp, $local_timestamp = NULL);

        return Kohana::message('fuzzy_date', $parent);
    }
}
