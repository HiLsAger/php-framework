<!-- Основной шаблон (например, в $this->base_template_dir/$this->main_template) -->

<!DOCTYPE html>
<html>

<head>
    <title>Мой сайт</title>
</head>

<body>
    @include('template.header')

    <div class="content">
        @yield('content')
    </div>

    @include('template.footer')
</body>

</html>
