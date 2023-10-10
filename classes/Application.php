<?php

namespace classes;

use languages\exceptions\ExceptionLanguage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Exception;
use stdClass;

class Application
{

    /**
     * Получить конфигурацию приложения
     * 
     * @property string $property
     * 
     * @return stdClass
     */
    static public function getConfig(string $property = null)
    {
        $config = require BASE_PATH . '/config.php';

        if ($property && isset($config[$property]))
            return $config[$property];
        else
            return $config;
    }

    /**
     * Запуск приложения
     */
    public function begin()
    {
        $this->includeClasses();
        $this->includeControllers();
        $this->includeLocals();
        $this->startController();
    }

    /**
     * Подключение системных файлов
     */
    private function includeClasses()
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(BASE_PATH_CLASSES));

        foreach ($iterator as $file) {
            if (
                $file->isFile() &&
                $file->getExtension() === 'php' &&
                basename($file) !== 'Application.php'
            ) {
                include_once $file;
            }
        }
    }

    /**
     * Подключение файлов контроллеров в приложение
     */
    private function includeControllers()
    {
        $files = glob(BASE_PATH_CONTROLLERS . '/*.php');

        foreach ($files as $file) {
            include_once $file;
        }
    }

    /**
     * Подключение файлов локализации в приложение
     */
    public function includeLocals()
    {
        $locals = self::getConfig('local');

        if ($locals) {
            foreach ($locals as $local) {
                $patternLocal = "/(.+)\.$local\.php$/i";
                $patternLanguage = "/(.+)\.Language\.php$/i";
                $iterator = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator(BASE_PATH_LANGUAGES)
                );

                foreach ($iterator as $file) {
                    if (
                        $file->isFile() &&
                        (preg_match($patternLocal, $file->getFilename()) || preg_match($patternLanguage, $file->getFilename()))
                    ) {
                        include_once $file->getPathname();
                    }
                }
            }
        }
    }

    /**
     * Поиск и запуск контроллера
     */
    private function startController()
    {
        /* Определение пути запроса */
        $page = strtok($_SERVER['REQUEST_URI'], '?');
        $page = substr($page, 1);

        /* Разделение пути запроса */
        $pages = explode('/', $page);

        /* Поиск и запуск контроллера */
        if (count($pages) >= 2) {
            $words = explode('-', $pages[0]);
            $controllerName = implode('', array_map('ucfirst', $words));
            if (file_exists("controllers/{$controllerName}.php")) {
                $className = 'controllers\\' . $controllerName;

                if (class_exists($className)) {
                    $class = new $className;

                    $convert_function = ucwords(
                        str_replace(
                            ' ',
                            '',
                            str_replace('-', ' ', $pages[1])
                        )
                    );

                    if (method_exists($class, $convert_function)) {
                        $class->{$convert_function}();
                        return true;
                    }
                }
            }
        }
        throw new Exception(ExceptionLanguage::getProperty('unknown_controller'));
    }
}
