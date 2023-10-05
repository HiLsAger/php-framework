<?php

namespace classes;

class Application
{
    public function begin()
    {
        $this->includeClasses();
        $this->includeControllers();
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
}
