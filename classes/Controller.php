<?php

namespace classes;

use Jenssegers\Blade\Blade;

class Controller
{

    // private string $base_template_dir = BASE_PATH_VIEWS . '/template';
    private string $base_template_dir = 'template';

    public string $main_template = 'main';

    public function __construct()
    {
    }

    protected function render(string $template, array $data = null)
    {
        $controllerViewName = strtolower(basename(get_called_class()));
        $viewDir = BASE_PATH_VIEWS;
        $cacheDir = BASE_PATH . "/.cache";
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        if (!file_exists($viewDir)) {
            mkdir($viewDir, 0755, true);
        }

        $bladeControllerTemplateView = new Blade($viewDir, $cacheDir);
        echo $bladeControllerTemplateView->make(
            $controllerViewName . '.' . $template,
            $data
        )->render();
    }
}
