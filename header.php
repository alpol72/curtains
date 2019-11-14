<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curtains main</title>

    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container header-container">
        <div class="row">
            <div class="col-md-3 header-container__logo">
                <?php the_custom_logo(); ?>
            </div>
            <div class="col-md-9 header-container__links">

            <?php
                wp_nav_menu( [
                'theme_location'  => 'top',
                'menu'            => '',
                'container'       => 'nav',
                'container_class' => null,
                'container_id'    => null,
                'menu_class'      => null,
                'menu_id'         => null,

                ] );  ?>


                <div class="header-container__phones">

                    <?php dynamic_sidebar( 'top-header' ); ?>

                </div>
            </div>
        </div>
    </div>
</header>
