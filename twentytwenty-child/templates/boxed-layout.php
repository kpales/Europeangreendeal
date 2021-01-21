<?php
/**
 * Template Name: Boxed layout front page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<div class="container title-headline mt-5">
    <div class="row align-items-center">
        <div class="col-9">
            <p class="title"><?php the_field('front_text');?></p>
        </div>
        <div class="col-3">
            <img src="<?php the_field('front_logo');?>" alt="">
        </div>
    </div>
</div>

<main id="site-content" role="main">

    <div class="container">

        <div class="row">

            <div class="col-12">
                <?php

                if ( have_posts() ) {

                    while ( have_posts() ) {
                        the_post();

                        the_content();
                    }
                }
                ?>
            </div>
        </div>
    </div>





</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
