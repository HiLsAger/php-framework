<?php

namespace classes;

class Application
{
    public function begin()
    {
        $this->includeClasses();
        $this->includeControllers();
        $this->startController();
    }

    private function includeClasses()
    {
        $files = glob(BASE_PATH_CLASSES . '/*.php');

        foreach ($files as $file) {
            if (basename($file) !== 'Application.php') {
                include_once $file;
            }
        }
    }

    private function includeControllers()
    {
        $files = glob(BASE_PATH_CONTROLLERS . '/*.php');

        foreach ($files as $file) {
            include_once $file;
        }
    }

    private function startController()
    {
        $page = strtok($_SERVER['REQUEST_URI'], '?');
        $page = substr($page, 1);


        $pages = explode('/', $page);
        $controller_exists = false;
        if (count($pages) >= 2) {
            $words = explode('-', $pages[0]);
            $controllerName = implode('', array_map('ucfirst', $words));
            if (file_exists("controllers/{$controllerName}.php")) {
                $className = 'controllers\\' . $controllerName;

                if (class_exists($className)) {
                    $class = new $className;

                    $convert_function = $convertedStr1 = str_replace('-', ' ', $pages[1]);
                    $convert_function = ucwords($convert_function);
                    $convert_function = $convertedStr1 = str_replace(' ', '', $convert_function);

                    if (method_exists($class, $convert_function)) {
                        $class->{$convert_function}();
                        $controller_exists = true;
                    }
                }
            }
        }
    }
}
