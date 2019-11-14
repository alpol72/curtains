<?php get_header() ?>


<!--search line-->
<div class="container search-line">
    <div class="row">
        <div class="col-md-3 search-line__filters">
            <p>каталог товаров</p>
        </div>
        <div class="col-md-9 search-line__input">

            <?php get_search_form(); ?>


            <div class="search-line__basket">
                <a href="#">
                    <div>
                        <img src="<?php echo THEME_IMAGES; ?>basket.png" alt="basket">
                        <i>2</i>
                    </div>
                    <p>1800$</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!--menu and slider-->
<div class="offer-back"></div>
<div class="back">
    <div class="container">
        <div class="row">
            <div class="col-md-3 sidebar-menu">
                <div class="sidebar-menu__box sticky">

                    <nav>
                        <ul>
                            <?php
                            $args = array(
                                'taxonomy' => 'product_cat',
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'hide_empty' => false
                            );

                            $product_categories = get_terms( $args );
                            $count = count($product_categories);
                            if ( $count > 0){
                                foreach ( $product_categories as $product_category ) {
                                    if ($product_category->name  != 'Uncategorized') {
                                        $img_str = "<i><img src=\"" . THEME_IMAGES . 'icon.png' . "\" alt=\"icon\"></i>";
                                        $item = "<li>";
                                        $item .= '<a href="' . get_term_link($product_category) . '">';
                                        $item .= $img_str;
                                        $item .= $product_category->name;
                                        $item .= '</a>';
                                        $item .= '</li>';
                                        echo $item;
                                    }

                                }
                            }
                            ?>
                        </ul>
                    </nav>

                </div>
            </div>
            <div class="col-md-9 main-content">
                <!--slider-->
                <div class="main-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="main-slider__info">
                                    <span class="new">Новая коллекция</span>
                                    <h2>Шторы для дома «Аквамарин»</h2>
                                    <p>производитель GreatCurtain</p>
                                    <a href="#" class="next_btn">Перейти к каталогу<i></i></a>
                                </div>
                                <img src="<?php echo THEME_IMAGES; ?>banner.jpg" alt="banner">
                            </div>
                            <div class="swiper-slide">
                                <div class="main-slider__info">
                                    <span class="new">Новая коллекция</span>
                                    <h2>Шторы для дома «Аквамарин»</h2>
                                    <p>производитель GreatCurtain</p>
                                    <a href="#">Перейти к каталогу<i>&#8594;</i></a>
                                </div>
                                <img src="<?php echo THEME_IMAGES; ?>banner.jpg" alt="banner">
                            </div>
                            <div class="swiper-slide">
                                <div class="main-slider__info">
                                    <span class="new">Новая коллекция</span>
                                    <h2>Шторы для дома «Аквамарин»</h2>
                                    <p>производитель GreatCurtain</p>
                                    <a href="#">Перейти к каталогу<i>&#8594;</i></a>
                                </div>
                                <img src="<?php echo THEME_IMAGES; ?>banner.jpg" alt="banner">
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>

                    </div>
                </div>
                <!--all-->



                <!--start shortcode. Выводим выгоды горизонтельно-->
                <?php echo do_shortcode('[benefits position="gorizont"]'); ?>

                <!--start shortcode. Выводим популярные продукты-->
                <?php echo do_shortcode('[f_products]'); ?>


                <!--start shortcode. Выводим выгоды вертикально-->
                <?php echo do_shortcode('[benefits position="vertical"]'); ?>

                <!--start shortcode. Выводим советы дизайнера-->
                <?php echo do_shortcode('[advice]Советы дизайнера[/advice]'); ?>



                <!--reviews-->
                <h2 class="main-title">Наши отзывы</h2>
                <div class="review-slider-btns">
                    <div class="swiper-container review-slider">
                        <div class="swiper-wrapper">
                            <!--slides-->
                            <div class="reviews swiper-slide">
                                <div class="reviews-image">
                                    <img src="assets/img/bordered-curtain.png" alt="image">
                                </div>
                                <div class="reviews-content">
                                    <div class="reviews-content__review">
                                        <div class="review">
                                            <h2>шторы в квартиру</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium assumenda consequatur
                                                distinctio</p>
                                        </div>
                                        <div class="customer">
                                            <img src="assets/img/man.png" alt="customer">
                                            <p>гарольд иванов</p>
                                        </div>
                                    </div>
                                    <div class="reviews-content__text">
                                        <img src="assets/img/item.png" alt="icon">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur doloribus ea earum ex
                                            explicabo
                                            hic iste itaque nemo numquam recusandae reprehenderit sint, soluta vero voluptate? Blanditiis
                                            consectetur
                                            ipsam temporibus?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="reviews swiper-slide">
                                <div class="reviews-image">
                                    <img src="assets/img/bordered-curtain.png" alt="image">
                                </div>
                                <div class="reviews-content">
                                    <div class="reviews-content__review">
                                        <div class="review">
                                            <h2>шторы в квартиру</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium assumenda consequatur
                                                distinctio</p>
                                        </div>
                                        <div class="customer">
                                            <img src="assets/img/man.png" alt="customer">
                                            <p>гарольд иванов</p>
                                        </div>
                                    </div>
                                    <div class="reviews-content__text">
                                        <img src="assets/img/item.png" alt="icon">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur doloribus ea earum ex
                                            explicabo
                                            hic iste itaque nemo numquam recusandae reprehenderit sint, soluta vero voluptate? Blanditiis
                                            consectetur
                                            ipsam temporibus?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="reviews swiper-slide">
                                <div class="reviews-image">
                                    <img src="assets/img/bordered-curtain.png" alt="image">
                                </div>
                                <div class="reviews-content">
                                    <div class="reviews-content__review">
                                        <div class="review">
                                            <h2>шторы в квартиру</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium assumenda consequatur
                                                distinctio</p>
                                        </div>
                                        <div class="customer">
                                            <img src="assets/img/man.png" alt="customer">
                                            <p>гарольд иванов</p>
                                        </div>
                                    </div>
                                    <div class="reviews-content__text">
                                        <img src="assets/img/item.png" alt="icon">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur doloribus ea earum ex
                                            explicabo
                                            hic iste itaque nemo numquam recusandae reprehenderit sint, soluta vero voluptate? Blanditiis
                                            consectetur
                                            ipsam temporibus?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-counter"></div>

                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container sticky-stopper">
    <div class="row">
        <div class="col-md-12">
            <h2 class="main-title">Мы с вами свяжемся</h2>
        </div>
    </div>
</div>

<div class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <p>Оставьте нам свои контакты и мы поможем вам сделать лучший выбор</p>
                <div class="contacts__inputs">
                    <input type="text" placeholder="Имя">
                    <input type="text" placeholder="Телефон">
                    <a href="#">отправить</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer() ?>
