<!DOCTYPE html>
<html lang="en">
<head>
<?php
/*
Template Name: NewsPaper page 
Template Post Type: page
*/ 
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo carbon_get_theme_option('name_guide'); ?></title>
    <link rel="icon" href="<?php echo wp_get_attachment_image_url(carbon_get_theme_option("logo"), 'full'); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
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
                            <a class="nav-link" aria-current="page" href="https://arizona-helper.com/newspaper">Статьи</a>
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
        <div class="container-fluid">
          <section class="section section-catalog js-section-catalog" id="section-catalog">
            <div class="container">
              <header class="section__header">
                <h2 class="page-title page-title--accent"><?php echo carbon_get_post_meta( $page_id, 'catalog_title' ); ?></h2>
                <nav class="catalog-nav">
                  
                  <?php
                    $catalog_nav = carbon_get_post_meta($page_id, 'catalog_nav');
                    $catalog_nav_ids = wp_list_pluck($catalog_nav, 'id');
                    
                    $catalog_nav_items = get_terms([
                      'include' => $catalog_nav_ids,
                    ]);
                  ?>
                  <ul class="catalog-nav__wrapper">
                    <li class="catalog-nav__item">
                      <button class="catalog-nav__btn is-active" type="button" data-filter="all">все</button>
                    </li>

                    <style>
                    .catalog-nav__item:nth-child(3) {
                      display: none;
                    }
                    .catalog-nav__item:nth-child(4) {
                      display: none;
                    }
                    .catalog-nav__item:nth-child(5) {
                      display: none;
                    }
                    </style>

                    <?php foreach ($catalog_nav_items as $item) : ?>
                      <li class="catalog-nav__item">
                        <button class="catalog-nav__btn" type="button" data-filter="<?php echo $item->slug; ?>"><?php echo $item->name; ?></button>
                      </li>
                    <?php endforeach; ?>

                  </ul>
                </nav >
              </header>

              <?php
                $catalog_products = carbon_get_post_meta( $page_id, 'catalog_products' );
                $catalog_products_ids = wp_list_pluck($catalog_products, 'id');

                $catalog_products_args = [
                  'post_type' => 'product',
                  'post__in' => $catalog_products_ids
                ];
                $catalog_products_query = new WP_Query( $catalog_products_args );

                $catalog_products_count = wp_count_posts('product');
                $catalog_products_count_publish = $catalog_products_count->pulish;
              ?>


            <div class="catalog js-catalog d-flex justify-content-center">
              <?php if ( $catalog_products_query->have_posts() ) : ?>

                <?php while ( $catalog_products_query->have_posts() ) : $catalog_products_query->the_post(); ?>
                  <?php echo get_template_part('product-content'); ?>
                <?php endwhile; ?>

              <?php endif; ?>

            </div>

            </div>
          </section>
        </div>
    </div>
    <?php get_footer(); ?>
    <script src="https://kit.fontawesome.com/3f104a38eb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>
  
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>
</html>