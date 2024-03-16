<?php

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Дополнительные поля' )
  ->show_on_page(9)

  ->add_tab( 'Каталог', [
    Field::make( 'text', 'catalog_title', 'Заголовок' ),
    Field::make( 'association', 'catalog_nav', 'Категории статей' )
    ->set_types( [
        [
            'type'      => 'term',
            'taxonomy' => 'product-categories',
        ]
    ] ),
    Field::make( 'association', 'catalog_products', 'Статьи' )
    ->set_types( [
        [
            'type'      => 'post',
            'post_type' => 'product',
        ]
     ] )
  ]);