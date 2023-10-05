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

// Подключаем файл header.php из папки /includes/
include(BASE_PATH . '/includes/header.php');

echo '<main>';
echo $content;
echo '</main>';

// Подключаем файл footer.php из папки /includes/
include(BASE_PATH . '/includes/footer.php');
