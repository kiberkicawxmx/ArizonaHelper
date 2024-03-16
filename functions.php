<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', 'Описание сайта' )
    ->add_tab( 'Общие настройки', [
        Field::make( 'text', 'sait_name', 'Введите название сайта' ),
        Field::make( 'text', 'sait_mininame', 'Введите сокращенное название сайта' ),
        Field::make( 'image', 'logo', 'Логотип'),
        Field::make( 'text', 'vk', 'Ссылка на группу VK' ),
        Field::make( 'text', 'discord', 'Ссылка на канал Discord' ),
    ])
    ->add_tab( 'Страница - Статьи', [
      Field::make( 'text', 'name_guide', 'Введите название страницы ( во вкладках отобразится )' ),
      Field::make('text', 'name_pageguide', 'Введите название страницы с гайдов ( во вкладках отобразится )')
    ])
    ->add_tab( 'Главная страница', [
      Field::make( 'text', 'sait_title', 'Описание сайта' ),
      Field::make( 'image', 'person', 'Персонаж')
    ])
    ->add_tab( 'Промокоды', [
      Field::make('text', 'name_pagepromo', 'Введите название страницы ( во вкладках отобразится )'),
      Field::make( 'image', 'arizona_phoenix', 'Сервер Phoenix'),
      Field::make( 'image', 'arizona_tucson', 'Сервер Tucson'),
      Field::make( 'image', 'arizona_chandler', 'Сервер Chandler'),
      Field::make( 'image', 'arizona_brainburg', 'Сервер Brainburg'),
      Field::make( 'image', 'arizona_sainrose', 'Сервер Saint Rose'),
      Field::make( 'image', 'arizona_mesa', 'Сервер Mesa'),
      Field::make( 'image', 'arizona_redrock', 'Сервер Red Rock'),
      Field::make( 'image', 'arizona_yuma', 'Сервер Yuma'),
      Field::make( 'image', 'arizona_surprise', 'Сервер Surprise'),
      Field::make( 'image', 'arizona_prescott', 'Сервер Prescott'),
      Field::make( 'image', 'arizona_glendale', 'Сервер Glendale'),
      Field::make( 'image', 'arizona_kingman', 'Сервер Kingman'),
      Field::make( 'image', 'arizona_winslow', 'Сервер Winslow'),
      Field::make( 'image', 'arizona_payson', 'Сервер Payson'),
      Field::make( 'image', 'arizona_gilbert', 'Сервер Gilbert'),
      Field::make( 'image', 'arizona_showlow', 'Сервер Show-Low'),
      Field::make( 'image', 'arizona_casagrande', 'Сервер Casa Grande'),
      Field::make( 'image', 'arizona_page', 'Сервер Page'),
      Field::make( 'image', 'arizona_suncity', 'Сервер Sun City'),
      Field::make( 'image', 'arizona_queencreek', 'Сервер Queen Creek'),
      Field::make( 'image', 'arizona_sedona', 'Сервер Sedona'),
      Field::make( 'image', 'arizona_mobile1', 'Сервер Mobile 1'),
      Field::make( 'image', 'arizona_mobile2', 'Сервер Mobile 2'),
      Field::make( 'image', 'arizona_mobile3', 'Сервер Mobile 3'),
    ])
    ->add_tab( 'Footer', [
      Field::make( 'text', 'footer', 'Введите Footer' ),
    ])
    ->add_tab( 'Актуальный гайд', [
      Field::make( 'text', 'last_guide_title', 'Название актуального гайда' ),
      Field::make( 'image', 'last_guide_image', 'Выберите фото актуального гайда'),
      Field::make( 'text', 'last_guide', 'Краткий текст актуального гайда' ),
      Field::make( 'text', 'full_last_guide', 'Полный текст актуального гайда' ),
    ]);
}

add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
  add_theme_support('post-thumbnails');
  add_image_size('product', 500, 313, true);
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields() {
  require_once( 'includes/carbon-fields-options/post-meta.php' );
}

function convertToWebpSrc($src) {
  $src_webp = $src . '.webp';
  return str_replace('uploads', 'uploads-webpc', $src_webp);
}

add_action( 'init', 'register_post_types' );
function register_post_types() {
  register_post_type('product', [
    'labels' => [
      'name'               => 'Статьи', // основное название для типа записи
      'singular_name'      => 'Статья', // название для одной записи этого типа
      'add_new'            => 'Добавить статью', // для добавления новой записи
      'add_new_item'       => 'Добавление статьи', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование статьи', // для редактирования типа записи
      'new_item'           => 'Новая статья', // текст новой записи
      'view_item'          => 'Смотреть статью', // для просмотра записи этого типа.
      'search_items'       => 'Искать статью', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'menu_name'          => 'Статьи', // название меню
    ],
    'menu_icon'          => 'dashicons-welcome-add-page',
    'public'             => true,
    'menu_position'      => 5,
    'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    'has_archive'        => true,
    'rewrite'            => ['slug' => 'newspaper']
   ] );

   register_taxonomy('product-categories', 'product', [
    'labels'        => [
      'name'                        => 'Категории статей',
      'singular_name'               => 'Категория статьи',
      'search_items'                =>  'Искать категории',
      'popular_items'               => 'Популярные категории',
      'all_items'                   => 'Все категории',
      'edit_item'                   => 'Изменить категорию',
      'update_item'                 => 'Обновить категорию',
      'add_new_item'                => 'Добавить новую категорию',
      'new_item_name'               => 'Новое название категории',
      'separate_items_with_commas'  => 'Отделить категории запятыми',
      'add_or_remove_items'         => 'Добавить или удалить категорию',
      'choose_from_most_used'       => 'Выбрать самую популярную категорию',
      'menu_name'                   => 'Категории',
    ],
    'hierarchical'  => true,
  ]);
}

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate