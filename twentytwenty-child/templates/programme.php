<?php
/**
 * Template Name: Programme
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

			<?php $args = array (
				'post_type'=> 'post',
				'post_status' => 'publish',
				'category_name' => 'speaker',
				'posts_per_page' => -1,
				);

            $query = new WP_Query( $args ); ?>
				<?php // The Loop   ?>            
					<?php if ( $query->have_posts() ) {  
						while ( $query->have_posts() ) {
							$query->the_post(); ?>
							<div class="speaker-popup" data-href="<?php echo esc_url( get_permalink()); ?>">
								<?php if ( has_post_thumbnail() ) { ?>
									<img src="<?php esc_url(get_the_post_thumbnail_url('small')); ?>"class="speaker-popup__foto">
								<?php } ?>
								<div class="speaker-popup__content">
									<h4 style="margin-top: 0"> <?php the_title(); ?></h4>
									<?php the_content(); ?>
								</div>
									<svg class="speaker-popup__close" width="16" height="16" viewBox="0 0 16 16"><line x1="2" x2="14" y1="14" y2="2"></line><line x1="14" x2="2" y1="14" y2="2"></line></svg>
							</div> <?php 
						} // end while
					} // end if

					// Restore original Post Data
					wp_reset_postdata();
				?> 

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
