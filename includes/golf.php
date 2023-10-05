<div class="margin-top gray-block" id="golf">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>
                    Водолазки гольф
                </h2>
            </div>
            <div class="col-12 product-description">
                <p>
                    Водолазка мягкой трикотажной вискозы – универсальный и практичный элемент мужского гардероба. Великолепные качества гиппоалергенной и технологичной ткани позволяют водолазке максимально комфортно садится по фигуре. Легкая и теплая модель с горлом гольф для защиты шеи от ветра в холодное время года.
                </p>
                <p>
                    Решая, с чем носить этот вариант одежды, можно не тратить много времени на выбор подходящих вариантов.
                </p>
                <p>
                    За счет простого силуэта водолазка идеально стилизуется с любыми вещами Вашего гардероба - классическими, так и повседневными casual.
                </p>
                <p class="mt-3">
                    <b>Преимущества водолазки</b>
                </p>
                <ul>
                    <li>Изготовлена из гипоаллергенной, технологичной ткани, поэтому идеально подходит на каждый день.</li>
                    <li>Имеет высокие показатели гигроскопичности, что позволяет телу «дышать» и чувствовать себя комфортно и уютно на протяжении всего дня</li>
                    <li>Идеально садится на любую фигуру за счет особого кроя и высококачественных материалов</li>
                    <li>Теплая и легкая, не сковывают движения и сохраняют оптимальную температуру тела.</li>
                    <li>Практичная и универсальная модель на каждый день, которая сохранит свой первоначальный вид надолго</li>
                </ul>
                <div class="d-md-flex justify-content-between v-center">
                    <div>
                        <span>
                            <b>Производитель</b>: Собственное производно MENZER
                        </span>
                        <span>
                            <b>Размер</b>: с 46 по 56
                        </span>
                        <span>
                            <b>Состав</b>: вискоза 30%, акрил: 20%, нейлон 22%, полиэстер 28%
                        </span>
                    </div>
                    <button class="button button-green modal-btn" title="Заказать сейчас">
                        Заказать сейчас
                    </button>
                </div>
                <!-- Выбор цвета -->
                <div class="d-flex weather-colors">
                    <button class="color-button-golf black-color active" data-color="blackGolf"></button>
                    <button class="color-button-golf blue-color" data-color="blueGolf"></button>
                    <button class="color-button-golf red-color" data-color="redGolf"></button>
                    <button class="color-button-golf white-color" data-color="whiteGolf"></button>
                </div>
                <?php
                function displayImagesGolf($color)
                {
                    // Путь к папке с изображениями
                    $directory = 'assets/images/products/golf/' . $color . '/';

                    // Получаем список файлов в папке
                    $files = scandir($directory);

                    // Фильтруем файлы, оставляем только JPG и PNG
                    $imageFiles = array_filter($files, function ($file) {
                        $extension = pathinfo($file, PATHINFO_EXTENSION);
                        return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp']);
                    });

                    // Выводим только первые 4 изображения с классом "limited"
                    $count = 0;
                    foreach ($imageFiles as $imageFile) {
                        if ($count < 4) {
                            echo '<div class="col-6 col-md-3 mt-4 text-center limited">';
                            echo '<a href="' . $directory . $imageFile . '" title="Водолазки гольф" data-fancybox="product-gallery-3">';
                            echo '<img src="' . $directory . $imageFile . '" class="img-fluid" alt="Водолазки гольф" title="Водолазки гольф" />';
                            echo '</a>';
                            echo '</div>';
                            $count++;
                        }
                    }
                }
                ?>

                <!-- Черные водолазки -->
                <div id="blackGolf-images" class="image-block row">
                    <?php displayImagesGolf('blackGolf'); ?>
                    <div class="col-12 mt-4">
                        <button class="button button-bordered mx-auto see-all-golf" title="Смотреть все фото" data-color="blackGolf">
                            Смотреть все фото
                        </button>
                    </div>
                </div>

                <!-- Голубые водолазки -->
                <div id="blueGolf-images" class="image-block row" style="display: none;">
                    <?php displayImagesGolf('blueGolf'); ?>

                    <div class="col-12 mt-4">
                        <button class="button button-bordered mx-auto see-all-golf" title="Смотреть все фото" data-color="blueGolf">
                            Смотреть все фото
                        </button>
                    </div>
                </div>

                <!-- Красные водолазки -->
                <div id="redGolf-images" class="image-block row" style="display: none;">
                    <?php displayImagesGolf('redGolf'); ?>
                    <div class="col-12 mt-4">
                        <button class="button button-bordered mx-auto see-all-golf" title="Смотреть все фото" data-color="redGolf">
                            Смотреть все фото
                        </button>
                    </div>
                </div>

                <!-- Белые водолазки -->
                <div id="whiteGolf-images" class="image-block row" style="display: none;">
                    <?php displayImagesGolf('whiteGolf'); ?>
                    <div class="col-12 mt-4">
                        <button class="button button-bordered mx-auto see-all-golf" title="Смотреть все фото" data-color="whiteGolf">
                            Смотреть все фото
                        </button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>