<?php

$logo = '<img src="/assets/images/logo.svg" alt="' . $title . '" title="' . $description . '">';

$phone = '<a href="tel:+79229410161" class="phone" title="Наш телефон +7 (922) 941-01-61">+7 (922) 941-01-61</a>';

$whatsapp = '<a href="https://wa.me/+79229410161" target="_blank" class="whatsapp" title="Мы в WhatsApp +7 (922) 941-01-61"><svg width="24" height="24">
<use xlink:href="/assets/images/sprite.svg#wa"></use>
</svg></a>';

$burger = '<div class="burger-menu">
<div class="burger-menu-top__block">&nbsp;</div>
<div class="burger-menu-middle__block">&nbsp;</div>
<div class="burger-menu-bottom__block">&nbsp;</div>
</div>';
// Получаем параметр "page" из URL


// Получаем параметр "page" из URL, игнорируя всё после "/?"
$page = strtok($_SERVER['REQUEST_URI'], '?');
$page = substr($page, 1);

define('BASE_PATH', __DIR__);
define('BASE_PATH_CONTROLLERS', __DIR__ . '/controllers');
define('BASE_PATH_CLASSES', __DIR__ . '/classes');
define('BASE_PATH_VIEWS', __DIR__ . '/views');

include_once('classes/Application.php');
$app = new classes\Application();
$app->begin();


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


if (!$controller_exists) {

    if ($page === '') {
        $page = 'home';
    }
    // Проверяем, если $page пустой или не существует, отправляем ошибку 404
    if ($page === '' || !file_exists("views/{$page}.php")) {
        header('HTTP/1.0 404 Not Found');
        // Устанавливаем название страницы
        $title = isset($page_titles[$page]) ? $page_titles[$page] : 'Страница не найдена';
        // Устанавливаем описание страницы
        $description = isset($page_descripotion[$page]) ? $page_descripotion[$page] : '';
        include('includes/header.php');
        include('views/error.php'); // Подключаем файл ошибки 404
        exit;
    }
    // Определяем массив с названиями страниц
    $page_titles = array(
        'home' => 'Оптово-розничная продажа мужской одежды из технологичных тканей.',
        'payment-order' => 'Оплатить заказ.',
        'payment-success' => 'Оплата прошла успешно!',
        'payment-error' => 'Оплата не удалась!'
    );

    // Определяем массив с названиями страниц
    $page_descripotion = array(
        'home' => 'Купить оптом и в розницу мужскую одержку из технологичных тканей',
        'payment-order' => 'Оплатить заказ.',
        'payment-success' => 'Оплата прошла успешно!',
        'payment-error' => 'Оплата не удалась!'
    );

    // Устанавливаем название страницы
    $title = isset($page_titles[$page]) ? $page_titles[$page] : 'Страница не найдена';
    // Устанавливаем описание страницы
    $description = isset($page_descripotion[$page]) ? $page_descripotion[$page] : '';


    // Подключаем файл header.php из папки /includes/
    include('includes/header.php');

    // Проверяем, существует ли файл в папке views с именем, указанным в параметре "page"
    $page_path = "views/{$page}.php";

    echo '<main>';
    if (file_exists($page_path)) {
        // Если файл существует, подключаем его
        include($page_path);
    } else {
        header('Location: /error');
    }
    echo '</main>';

    // Подключаем файл footer.php из папки /includes/
    include('includes/footer.php');
}
