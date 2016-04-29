<?php defined('SYSPATH') or die('No direct script access.');

return array(
    'images' => array(
        'default' => array(
            'max_size'  => '6M',
        ),
    ),
    'files' => array(
        'default' => array(
            'max_size'    => '7M',
            'extensions'  => array(
                'doc', 'docx', 'docm', 'rtf', 'odt',
                'xls', 'xlsx', 'xlsm', 'ods', 'ppt',
                'pptx', 'odp', 'odg', 'tiff', 'tif',
                'jpg', 'pdf',
            ),
        ),
    ),
);
