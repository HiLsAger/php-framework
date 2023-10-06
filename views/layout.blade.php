<!-- Основной шаблон (например, в $this->base_template_dir/$this->main_template) -->

<!DOCTYPE html>
<html>

<head>
    <title>Мой сайт</title>
</head>

<body>
    хуй
    {{-- @include($layout) <!-- Включаем основной шаблон --> --}}

    <div class="content">
        @yield('content') <!-- Вставляем контент из вторичных шаблонов -->
    </div>

    {{-- @include('footer') <!-- Включаем футер --> --}}
</body>

</html>
