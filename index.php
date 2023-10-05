<?php
$logo = '<img src="/assets/images/logo.svg" alt="'.$title.'" title="'.$description.'">';

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
$page = substr($page, 1); // Убираем начальный слеш
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
);

// Определяем массив с названиями страниц
$page_descripotion = array(
    'home' => 'Купить оптом и в розницу мужскую одержку из технологичных тканей',
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

?>