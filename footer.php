<footer class="">
    <div class="container">
        <div class="row">
            <div class="col-md contacts-footer">
                <h2>Контакты</h2>
                <nav>
                    <ul>
                        <li class="location">
                            <sddress><a href="http://maps.google.com/maps?q=<?php echo get_theme_mod('address') ?>" target="_blank"><span><i class="fas fa-map-marker-alt"></i></span><div id="contacts"><?php echo get_theme_mod('address') ?></div></a></sddress>
                        </li>
                        <li class="phone">
                            <a href="tel:<?php echo get_theme_mod('phone') ?>">
                <span>
                  <i class="fas fa-phone"></i>
                </span><div id="phone"><?php echo get_theme_mod('phone') ?></div>
                            </a>
                        </li>
                        <li class="mail">
                            <a href="mailto:<?php echo get_theme_mod('mail') ?>">
                                <span><i class="fas fa-envelope"></i></span><div id="home_mail"><?php echo get_theme_mod('mail') ?></div></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md">
                <h2>Покупателям</h2>
                <?php
                wp_nav_menu( [
                    'theme_location'  => 'footer_intro',
                    'menu'            => '',
                    'container'       => 'nav',
                    'container_class' => null,
                    'container_id'    => null,
                    'menu_class'      => null,
                    'menu_id'         => null,

                ] );  ?>

            </div>
            <div class="col-md-4">
                <h4>остались вопросы?</h4>
                <a href="#" class="footer-btn">обратный звонок</a>
            </div>
            <div class="col-md">
                <h2>Информация</h2>
                <?php
                wp_nav_menu( [
                    'theme_location'  => 'footer_info',
                    'menu'            => '',
                    'container'       => 'nav',
                    'container_class' => null,
                    'container_id'    => null,
                    'menu_class'      => null,
                    'menu_id'         => null,

                ] );  ?>


            </div>
            <div class="col-md footer-social">
                <h2>Мы в соц сетях</h2>
                <nav>
                    <ul>
                        <li><a href="<?php echo get_theme_mod('facebook') ?>"><span><i class="fab fa-facebook-f"></i></span>facebook</a></li>
                        <li><a href="<?php echo get_theme_mod('instagram') ?>"><span><i class="fab fa-instagram"></i></span>instagram</a></li>
                        <li><a href="<?php echo get_theme_mod('twitter') ?>"><span><i class="fab fa-twitter"></i></span>twitter</a></li>
                        <li><a href="<?php echo get_theme_mod('youtube') ?>"><span><i class="fab fa-youtube"></i></span>youtube</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-12 footer-line">
                <p>© All Rights Reserved</p>
                <span>2019</span>
                <p>Design by OM</p>
            </div>
        </div>
    </div>
</footer>



<? wp_footer(); ?>
</body>


