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

    private function getControllerViewName()
    {
        return strtolower(basename(get_called_class()));
    }

    protected function render(string $template, array $data = null)
    {
        $cacheDir = BASE_PATH . "/.cache";
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        if (!file_exists(BASE_PATH_VIEWS)) {
            mkdir(BASE_PATH_VIEWS, 0755, true);
        }

        $bladeControllerTemplateView = new Blade(BASE_PATH_VIEWS, $cacheDir);
        echo $bladeControllerTemplateView->make(
            $this->getControllerViewName() . '.' . $template,
            $data
        )->render();
    }
}
