<!--Выводим популярные продукты плиткой. Для реализации непосредственно на странице вывода-->
<h2 class="main-title">Популярные товары</h2>
<div class="row">

    <?php
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


    while ( $loop->have_posts() ): $loop->the_post(); ?>


        <div class="col-md-3">
            <div class="products">

                <div class="products__image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>

                <div class="products__middle">

                    <a href="<?php the_permalink(); ?>" class="products__btn">заказать</a>
                </div>
                <div class="products__text">
                    <p><?php the_title(); ?></p>
                    <p><?php echo $product->get_sale_price(); ?><i><?php echo get_woocommerce_currency_symbol( $currency = 'UAH' )?></i></p>
                </div>
            </div>
        </div>


    <?php endwhile; ?>

    <a href="#" class="next_btn centered">Перейти к каталогу<i></i></a>
</div>
<!--end of popular products-->


/* вывод категорий через меню

$img_str = "<i><img src=\"". THEME_IMAGES . 'icon.png' . "\" alt=\"icon\"></i>";
wp_nav_menu( [
'theme_location'  => 'left',
'menu'            => '',
'container'       => 'nav',
'container_class' => null,
'container_id'    => null,
'menu_class'      => null,
'menu_id'         => null,
'link_before'     => $img_str,

] );
*/
