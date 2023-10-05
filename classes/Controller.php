<?php

namespace classes;

class Controller
{

    public $template = BASE_PATH_VIEWS . '/template/main.php';

    public function __construct()
    {
    }

    protected function render(string $template, array $data = null)
    {
        if ($data !== null) {
            extract($data); // Эта функция преобразует ключи массива в переменные
        }
        ob_start();
        include BASE_PATH_VIEWS . "/$template.php";
        $content = ob_get_clean();

        include $this->template;
    }
}
