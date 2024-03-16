<?php
/*
Template Name: CurrentGuide
*/ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo carbon_get_theme_option('name_pagenews'); ?></title>
    <link rel="icon" href="<?php echo wp_get_attachment_image_url(carbon_get_theme_option("logo"), 'full'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-3">
              <a class="navbar-brand" href="https://arizona-helper.com">
                <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option("logo"), 'full'); ?>" width="80" height="80" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon">
                    <i class="fa-solid fa-bars"></i>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex justify-content-end w-100">
                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="https://arizona-helper.com/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="https://arizona-helper.com/newspaper/">Статьи</a>
                        </li>
                        <li class="nav-item last">
                            <a class="nav-link" aria-current="page" href="https://arizona-helper.com/promo">Промокоды</a>
                        </li>
                        <a href="#">
                            <i class="fa-solid fa-magnifying-glass" style="color: #596284;"></i>
                        </a>
                    </ul>
                </div>
              </div>
            </div>
        </nav>
        <div class="container-fluid d-flex justify-content-end">
            <div class="d-flex flex-column">
                <a href="<?php echo carbon_get_theme_option('vk'); ?>" style="position: relative; left: 5px;">
                    <i class="fa-brands fa-vk" style="color: white; font-size: 30px;"></i>
                </a>
            <a href="<?php echo carbon_get_theme_option('discord'); ?>">
                <i class="fa-brands fa-discord pt-3" style="color: white; font-size: 30px;"></i>
            </a>
            </div>
        </div>
        <div class="container pb-5">
            <p class="fs-1 fw-bold text-white text-center"><?php echo carbon_get_theme_option('last_guide_title'); ?></p>
            <div class="container-image">
                <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option("last_guide_image"), 'full'); ?>" alt="">
            </div>
            <p class="fs-4 text-white p-3"><?php echo carbon_get_theme_option('full_last_guide'); ?></p>
        </div>
    </div>
    <?php get_footer(); ?>
    <script src="https://kit.fontawesome.com/3f104a38eb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>