<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include(BASE_PATH . '/includes/metas.php'); ?>
    <?php include(BASE_PATH . '/includes/style.php'); ?>
</head>

<body>
    <header>
        <div class="container">
            <div class="row v-center">
                <div class="col-6 col-md-3">
                    <a href="/" title="<?php echo $title ?>">
                        <?php echo $logo ?>
                    </a>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <?php include('nav.php'); ?>
                </div>
                <div class="col-lg-3 text-md-end d-none d-lg-block">
                    <?php echo $whatsapp ?>
                    <?php echo $phone ?>
                </div>
                <div class="col d-lg-none">
                    <?php echo $burger ?>
                </div>
                <div class="mobile-menu-block">
                    <div class="container">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-4">Меню</h4>
                        </div>
                        <?php include('nav.php'); ?>
                        <?php echo $whatsapp ?>
                        <?php echo $phone ?>
                    </div>
                </div>
            </div>
        </div>
    </header>