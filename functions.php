<?php

define('THEME_IMAGES', trailingslashit(get_stylesheet_directory_uri() . '/assets/img/'));


add_action( 'wp_enqueue_scripts', 'curtain_style' );
add_action( 'wp_enqueue_scripts', 'curtain_scripts' );
add_action( 'after_setup_theme', 'menu_register');
add_action( 'init', 'register_post_types_benefits' );
add_action( 'init', 'register_post_types_advice' );
add_action( 'init', 'create_benefits_taxonomies', 0 );
add_action( 'after_setup_theme', 'add_logo');
add_action('customize_register', 'customize_footer_register');

add_filter( 'style_loader_tag', 'new_style_loader_tag', 10, 2 );
add_filter( 'script_loader_tag', 'new_script_loader_tag', 10, 2 );

add_shortcode( 'f_products', 'get_featured_products' );
add_shortcode('benefits', 'get_benefits_block');
add_shortcode('advice', 'get_advice_block');







function menu_register(){
    register_nav_menu( 'top', 'Меню в шапке' );
    register_nav_menu( 'footer_intro', 'Меню в футере Покупателям' );
    register_nav_menu( 'footer_info', 'Меню в футере Информация' );
    register_nav_menu( 'left', 'Меню Каталог товаров' );

}


function curtain_style (){
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/styles.css');
    wp_enqueue_style('all', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css');
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css');
}

function curtain_scripts (){
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js',array(), '', true);
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array( 'jquery' ), '1.14.7', true);
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ), '1.14.7', true);
    wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', array( 'jquery' ), true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.14.7', true);
    wp_enqueue_script('customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'jquery' ), '1.14.7', true);

}

function new_style_loader_tag( $html, $handle ) {
    $scripts_to_load = array(
        array(
            ( 'name' )      => 'bootstrap',
            ( 'integrity' ) => 'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T',
        ),

        array(
            ( 'name' )      => 'all',
            ( 'integrity' ) => 'sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay',
        ),
    );

    $key = array_search( $handle, array_column( $scripts_to_load, 'name' ) );

    if ( false !== $key ) {
        $html = str_replace( '/>', ' integrity=\'' . $scripts_to_load[ $key ]['integrity'] . '\' crossorigin=\'anonymous\' />', $html );
    }

    return $html;
}

function new_script_loader_tag( $tag, $handle ) {
    $scripts_to_load = array(
        array(
            ( 'name' )      => 'jquery',
            ( 'integrity' ) => 'sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=',
        ),

        array(
            ( 'name' )      => 'popper-js',
            ( 'integrity' ) => 'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1',
        ),
        array(
            ( 'name' )      => 'bootstrap-js',
            ( 'integrity' ) => 'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM',
        ),

    );

    $key = array_search( $handle, array_column( $scripts_to_load, 'name' ) );

    if ( false !== $key ) {
        $tag = str_replace( '></script>', ' integrity=\'' . $scripts_to_load[ $key ]['integrity'] . '\' crossorigin=\'anonymous\'></script>', $tag );
    }

    return $tag;
}

register_sidebar( array(
    'name' => __( 'Телефоны в шапке', '' ),
    'id' => 'top-header',
    'description' => __( 'Шапка', '' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );

function get_featured_products( $atts )
{
        $product = wc_get_product();

        $loop = new WP_Query( array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => 'featured',
                            ),
                        ),
                    ));
        $title_str = '<h2 class="main-title">Популярные товары</h2><div class="row">';

        $out_str = '';
        while ( $loop->have_posts() ): $loop->the_post();
            $price = get_post_meta( get_the_ID(), '_price', true );
            $item_str = "<div class='col-md-3'>";
            $item_str .= "<div class='products'>";
            $item_str .= "<div class='products__image' style='background-image: url(" . get_the_post_thumbnail_url() . ")'></div>";
            $item_str .= "<div class='products__middle'>" . "<a href='" . get_permalink() . "' class='products__btn'>заказать</a>" . '</div>';
            $item_str .= "<div class='products__text'> <p>" . get_the_title() . "</p>";
            $item_str .= "<p>" . wc_price($price) . "</p>";
            $item_str .= "</div></div></div>";

            $out_str .= $item_str;

        endwhile;
        $catalog_str = '<a href="#" class="next_btn centered">Перейти к каталогу<i></i></a></div>';

    return $title_str . $out_str . $catalog_str;

}


function register_post_types_benefits(){
    register_post_type('benefits', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Записи в инфоблоке', // основное название для типа записи
            'singular_name'      => 'Записи в инфоблоке', // название для одной записи этого типа
            'add_new'            => 'Добавить запись в инфоблок', // для добавления новой записи
            'add_new_item'       => 'Добавление записи в инфоблок', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование записи в инфоблоке', // для редактирования типа записи
            'new_item'           => 'Текст новой записи в инфоблоке', // текст новой записи
            'view_item'          => 'Смотреть содержание записи в инфоблоке', // для просмотра записи этого типа.
            'search_items'       => 'Искать запись в инфоблоке', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Инфоблок', // название меню
        ),
        'description'         => 'Это буллеты, включающие иконку, заголовок и короткий текст в инфоблоке. Расскажите о своих выгодах',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-awards',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['benefits_position'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}

function register_post_types_advice(){
    register_post_type('advice', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Советы дизайнера', // основное название для типа записи
            'singular_name'      => 'Советы дизайнера', // название для одной записи этого типа
            'add_new'            => 'Добавить запись', // для добавления новой записи
            'add_new_item'       => 'Добавление записи', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование записи', // для редактирования типа записи
            'new_item'           => 'Текст новой записи', // текст новой записи
            'view_item'          => 'Смотреть содержание записи', // для просмотра записи этого типа.
            'search_items'       => 'Искать запись', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Советы дизайнера', // название меню
        ),
        'description'         => 'Это буллеты, включающие иконку, заголовок и короткий текст в инфоблоке. Расскажите о своих выгодах',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-awards',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'comments' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [''],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}



function create_benefits_taxonomies(){
    $labels = array(
        'name' => 'Представление блоков',
        'singular_name' => 'Представление',
        'search_items' =>  'Найти представление',
        'all_items' => 'Все представления',
        'parent_item' => 'Родительское представление',
        'parent_item_colon' => 'Родительское представление',
        'edit_item' => 'Родительское представление',
        'update_item' => 'Обновить представление',
        'add_new_item' => 'Добавить новое представление',
        'new_item_name' => 'Название нового представления',
        'menu_name' => 'Представление блоков',
    );

    register_taxonomy('benefits', array('benefits'), array(
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'benefits_position' ),
        'meta_box_cb' => 'post_categories_meta_box',
        'show_in_quick_edit' => true,
    ));

}

function get_benefits_block($atts){
    $atts = shortcode_atts( array(
        'position' => 'gorizont',
    ), $atts );

    $position = $atts['position'];


    $posts = get_posts( array(
        'numberposts' => 4,
        'post_type'   => 'benefits',
        'tax_query' => array(
            array(
                'taxonomy' => 'benefits',
                'field'    => 'slug',
                'terms'    => $position
            )
        )
    ) );



    if ($position == 'vertical') {

        $out_item_vert = '<h2 class="main-title">Мы предлагаем</h2><div class="row"><div class="offer col-md-10 offset-md-1">';
        foreach( $posts as $post ){
            setup_postdata($post);


            $out_item_vert .= '<div class="offer__box">';
            $out_item_vert .= '<div class="circle-box offer__img">';
            $out_item_vert .= '<div class="circle-box__circle"><div></div></div>';
            $out_item_vert .= get_the_post_thumbnail($post->ID, array(33,40), '') . '</div>';
            $out_item_vert .= '<div class="offer__text">';
            $out_item_vert .= '<h2>' . $post->post_title . '</h2>';
            $out_item_vert .= $post->post_content . '</div></div>';

        }
        $out_item_vert .='</div></div>';
        return $out_item_vert;
        wp_reset_postdata();

    } elseif (($position == 'gorizont')){

        $out_item_gor = '<div class="miscellaneous">';
        foreach( $posts as $post ){
            setup_postdata($post);


            $out_item_gor .= '<div class="miscellaneous__box">';
            $out_item_gor .= '<div class="circle-box">';
            $out_item_gor .= '<div class="circle-box__circle"><div></div></div>';
            $out_item_gor .= get_the_post_thumbnail($post->ID, array(33,40), '') . '</div>';
            $out_item_gor .= '<p>' . $post->post_title . '</p>';
            $out_item_gor .= $post->post_content . '</div>';

        }
        $out_item_gor .= '</div>';
        return $out_item_gor;
        wp_reset_postdata();

    }
}


function get_advice_block($atts, $title){

    $posts = get_posts( array(
        'numberposts' => 10,
        'post_type'   => 'advice',

    ) );


    $out_item =   '<h2 class="main-title">' . $title . '</h2><div class="advices-slider custom-slider"><div class="swiper-container"><div class="swiper-wrapper">';

        foreach( $posts as $post ){
            setup_postdata($post);


            $out_item .= '<div class="advices swiper-slide">';
            $out_item .= "<div class='advices__img' style='background-image: url(" . get_the_post_thumbnail_url($post->ID) . ")'></div>";
            $out_item .= '<div class="advices__content">';
            $out_item .= '<h2>' . $post->post_title . '</h2>';
            $out_item .= '<p>' . get_the_excerpt( $post->ID ) . '</p>';
            $out_item .= '<div class="advices__links">';
            $out_item .= '<span class="advices__date">' . get_the_date('n.j.Y') . '</span>';
            $out_item .= "<a href=" . get_permalink($post->ID) . " class='advices__read-more'>Подробнее<i></i></a>";
            $out_item .= '</div></div></div>';

        }
        $out_item .='</div></div>';
        $out_item .='<div class="swiper-button-prev"></div>';
        $out_item .='<div class="swiper-button-next"></div></div>';

        return $out_item;
        wp_reset_postdata();
}

if(!function_exists('add_logo')){
    function add_logo() {
        $args = array(
           'height' => 200,
           'width' => 200,
            'flex-height' => true,
            'flrx-width' => true,
        );
        add_theme_support('custom-logo', $args);
    }

}

// =========================== Customize============================================


function customize_footer_register($wp_customize){


    $wp_customize->add_section('contacts', array(  //Добавляем секцию "Контакты"  в footer
        'title' => __('Контакты', 'curtains'),
        'priority'  => 30,

    ));

    $wp_customize->add_setting('address', //Добавляем строку адреса в footer секцию "Контакты"
        array(
            'default'    =>  '',
            'transport'  =>  'postMessage',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'address',
            array(
                'label'      => __('Адрес'),
                'section'    => 'contacts',
                'settings'   => 'address',
                'type' => 'textarea',

            )
        )
    );


    $wp_customize->add_setting('phone', //Добавляем строку телефона в footer секцию "Контакты"
        array(
            'default'    =>  '',
            'transport'  =>  'postMessage',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'phone',
            array(
                'label'      => __('Телефон'),
                'section'    => 'contacts',
                'settings'   => 'phone',
                'type' => 'text',

            )
        )
    );


    $wp_customize->add_setting('mail', //Добавляем строку e-mail в footer секцию "Контакты"
        array(
            'default'    =>  '',
            'transport'  =>  'postMessage',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mail',
            array(
                'label'      => __('E-mail'),
                'section'    => 'contacts',
                'settings'   => 'mail',
                'type' => 'text',

            )
        )
    );

    $wp_customize->add_section('socnets', array(  //Добавляем секцию "Соцсети"  в footer
        'title' => __('Мы в соцсетях', 'curtains'),
        'priority'  => 30,

    ));

    $wp_customize->add_setting('facebook', //Добавляем строку facebook в footer секцию "Соцсети"
        array(
            'default'    =>  'https://www.facebook.com/',
            'transport'  =>  'refresh',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'facebook',
            array(
                'label'      => __('Facebook'),
                'section'    => 'socnets',
                'settings'   => 'facebook',
                'type' => 'text',

            )
        )
    );


    $wp_customize->add_setting('instagram', //Добавляем строку instagram в footer секцию "Соцсети"
        array(
            'default'    =>  'https://instagram.com/',
            'transport'  =>  'refresh',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'instagram',
            array(
                'label'      => __('Instagram'),
                'section'    => 'socnets',
                'settings'   => 'instagram',
                'type' => 'text',

            )
        )
    );


    $wp_customize->add_setting('twitter', //Добавляем строку twitter в footer секцию "Соцсети"
        array(
            'default'    =>  'https://twitter.com/',
            'transport'  =>  'refresh',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'twitter',
            array(
                'label'      => __('Twitter'),
                'section'    => 'socnets',
                'settings'   => 'twitter',
                'type' => 'text',

            )
        )
    );

    $wp_customize->add_setting('youtube', //Добавляем строку youtube в footer секцию "Соцсети"
        array(
            'default'    =>  'https://youtube.com/',
            'transport'  =>  'refresh',
        )
    );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'youtube',
            array(
                'label'      => __('Youtube'),
                'section'    => 'socnets',
                'settings'   => 'youtube',
                'type' => 'text',

            )
        )
    );





}

