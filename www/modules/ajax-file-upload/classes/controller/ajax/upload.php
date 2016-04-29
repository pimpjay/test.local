<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Загрузка файлов
 *
 * @package
 * @copyright  15web.ru
 */
class Controller_Ajax_Upload extends Controller_Ajax_Base {

    /**
     * Загрузка изображения.
     */
    public function action_image()
    {
        $config = Kohana::$config->load('upload.files.default');

        foreach ($_FILES as $input_name => $file)
        {
            if (($file['tmp_name']))
            {
                $file_validation = Validation::factory($_FILES)->label($input_name, 'Файл')
                    ->rule($input_name, 'Upload::image')
                    ->rule($input_name, 'Upload::size', array(':value', Arr::get($config, 'max_size')));

                $this->common_handle($file_validation, $file);
            }
        }
    }

    /**
     * Загрузка документа.
     */
    public function action_document()
    {
        $config = Kohana::$config->load('upload.files.default');

        $uploaded_tmp_file = $_FILES['file'];

        $validation = Validation::factory($_FILES)->label('file', 'Файл')
            ->rule('file', 'Upload::valid')
            ->rule('file', 'Upload::size', array(':value', Arr::get($config, 'max_size')))
            ->rule('file', 'Upload::type', array(':value', Arr::get($config, 'extensions')));

        $this->common_handle($validation, $uploaded_tmp_file);
    }

    /**
     * Общий обработчик загрузки. Регламентирует общение с клиентом.
     * @param Validation $validation
     * @param array $file Элемент массива $_FILES
     */
    protected function common_handle(Validation $validation, $file)
    {
        if ($validation->check())
        {
            $this->save_file($file);
        }
        else
        {
            $this->answer(array(
                'status' => FALSE,
                'error'  => $validation->errors('validation/file'),
            ));
        }
    }

    /**
     * Сохранить загруженный файл.
     * @param array $file Элемент массива $_FILES.
     * @return mixed
     */
    protected function save_file($file)
    {
        $save_dir = $this->create_directory();
        $absolute_file_path = Upload::save($file, NULL, $save_dir);
        $file_path = '/'.str_replace(DOCROOT, '', $absolute_file_path);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $file_model = ORM::factory('file')->values(array(
            'original_name' => $file['name'],
            'path'          => $file_path,
            'user_id'       => $this->user->id,
            'filesize'      => $file['size'],
            'mime_type'     => finfo_file($finfo, $absolute_file_path),
        ));

        finfo_close($finfo);

        return $this->save_model($file_model);
    }

    /**
     * Создать директорию для загруженного файла.
     * @return string
     */
    protected function create_directory()
    {
        $path = strtr('upload/site/<year>/<month>/<day>', array(
            '<year>'  => Date::formatted_time(NULL, 'Y'),
            '<month>' => Date::formatted_time(NULL, 'm'),
            '<day>'   => Date::formatted_time(NULL, 'd'),
        ));

        $save_dir = ltrim($path, '/');
        if ( ! is_dir($save_dir))
        {
            mkdir($save_dir, 0775, TRUE);
        }

        return $save_dir;
    }

    /**
     * Сохранить модель файла.
     * @param Model_File $file
     * @return mixed
     */
    protected function save_model($file)
    {
        try
        {
            $file->save();

            $this->answer(array(
                'status' => TRUE,
                'body'   => $file->path,
            ));

            return $file;
        }
        catch (Exception $ex)
        {
            $this->answer(array(
                'status' => FALSE,
                'error'  => array(
                    'file' => 'Не удалось сохранить файл на сервере',
                ),
            ));
        }
    }

    /**
     * Перегружает заголовки, поскольку у IE имеются проблемы с парсингом text/json.
     */
    public function after()
    {
        if (is_array($this->_answer))
        {
            $this->response->headers('Content-type', 'text/plain');
            $this->_answer = json_encode($this->_answer);
        }
        $this->response->body($this->_answer);
    }

}
