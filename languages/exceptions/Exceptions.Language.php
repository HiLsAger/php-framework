<?php

namespace languages\exceptions;

use class\interfaces\InterfacesLanguage;
use classes\Application;

class ExceptionLanguage implements InterfacesLanguage
{
    /**
     * Поиск значения свойства
     * 
     * @property string $property Значение для поиска в файле локализации
     * @property string $pattern Список заменяемых паттернов
     * @property string $values Список значений для замены
     * 
     * @return string Строка со значением локализации
     */
    public static function getProperty(
        string $property,
        array|string|null $pattern = null,
        array|string|null $values = null
    ): string {

        $local = Application::getConfig('local')[0];

        $childClass = "languages\\exceptions\\Exceptions$local";
        return $childClass::$$property;
    }
}
