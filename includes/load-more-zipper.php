<?php
if (isset($_POST['color'])) {
    $color = $_POST['color'];

    // Путь к папке с изображениями
    $directory = '../assets/images/products/zipper/' . $color . '/';

    // Получаем список файлов в папке
    $files = scandir($directory);

    $imageFiles = array_filter($files, function ($file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp']);
    });

    // Пропускаем первые 4 изображения
    $filteredImages = array_slice($imageFiles, 4);

    foreach ($filteredImages as $imageFile) {
        echo '<div class="col-6 col-md-3 mt-4 text-center">';
        echo '<a href="' . $directory . $imageFile . '" title="Водолазки на молнии" data-fancybox="product-gallery-1">';
        echo '<img src="' . $directory . $imageFile . '" class="img-fluid" alt="Водолазки на молнии" title="Водолазки на молнии" />';
        echo '</a>';
        echo '</div>';
    }
}
?>
