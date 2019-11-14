<?php
/*
 * Template Name: Benefits
 *
 */
?>

<?php get_header(); ?>



<?php


$position = 'vertical';


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
            $out_item_vert .= get_the_post_thumbnail(null, array(33,40), '') . '</div>';
            $out_item_vert .= '<div class="offer__text">';
            $out_item_vert .= '<h2>' . get_the_title() . '</h2>';
            $out_item_vert .= get_the_content() . '</div></div>';

     }
    $out_item_vert .='</div></div></div>';
    echo $out_item_vert;
    wp_reset_postdata();

} elseif (($position == 'gorizont')){

    $out_item_gor = '<div class="miscellaneous">';
    foreach( $posts as $post ){
        setup_postdata($post);


        $out_item_gor .= '<div class="miscellaneous__box">';
        $out_item_gor .= '<div class="circle-box">';
        $out_item_gor .= '<div class="circle-box__circle"><div></div></div>';
        $out_item_gor .= get_the_post_thumbnail(null, array(33,40), '') . '</div>';
        $out_item_gor .= '<p>' . get_the_title() . '</p>';
        $out_item_gor .= get_the_content() . '</div>';

    }
    $out_item_gor .= '</div>';
    echo $out_item_gor;
    wp_reset_postdata();

}

?>




<h2 class="main-title">!Мы предлагаем!</h2>
<div class="row">
    <div class="offer col-md-10 offset-md-1">

        <div class="offer__box">
            <div class="circle-box offer__img">
                <div class="circle-box__circle">
                    <div></div>
                </div>
                <img src="assets/img/5.png" alt="icon">
            </div>
            <div class="offer__text">
                <h2>качественные ткани</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa
                    dignissimos earum eos ex explicabo fugiat odio</p>
            </div>
        </div>



        <div class="offer__box">
            <div class="circle-box offer__img">
                <div class="circle-box__circle">
                    <div></div>
                </div>
                <img src="assets/img/5.png" alt="icon">
            </div>
            <div class="offer__text">
                <h2>качественные ткани</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa
                    dignissimos earum eos ex explicabo fugiat odio</p>
            </div>
        </div>
        <div class="offer__box">
            <div class="circle-box offer__img">
                <div class="circle-box__circle">
                    <div></div>
                </div>
                <img src="assets/img/5.png" alt="icon">
            </div>
            <div class="offer__text">
                <h2>качественные ткани</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa
                    dignissimos earum eos ex explicabo fugiat odio</p>
            </div>
        </div>
        <div class="offer__box">
            <div class="circle-box offer__img">
                <div class="circle-box__circle">
                    <div></div>
                </div>
                <img src="assets/img/5.png" alt="icon">
            </div>
            <div class="offer__text">
                <h2>качественные ткани</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa
                    dignissimos earum eos ex explicabo fugiat odio</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
