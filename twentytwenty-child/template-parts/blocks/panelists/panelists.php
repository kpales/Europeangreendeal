<?php
/**
 * Block template file: template-parts/blocks/panelists/panelists.php
 *
 * Panelists Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'panelists-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-panelists';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php $args = array (
				'post_type'=> 'post',
				'post_status' => 'publish',
				'category_name' => 'speaker',
				'posts_per_page' => -1,
                );

$query = new WP_Query( $args ); 
$count = $query->post_count; ?>

    <?php // The Loop   ?>            
        <?php if ( $query->have_posts() ) {  ?>
            <div class="sh-container">
                <div class="sh-row">
                <?php while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                    <a class="sh-col-3 panelist-tile" href="<?php echo esc_url( get_permalink()); ?>">
                        <?php if ( has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?> 
                        <?php endif; ?>
                        <div class="panelist-name"><?php the_title(); ?></div>
                    </a>
                    <?php if (get_row_index()%4 == 0)  { ?> 
                        </div> <!-- end row -->
                        <div class="sh-row"> <!-- start row -->
                    <?php } ?> 
                <?php } ?> 
                
                    <?php if ($count%4 !==0 ) {  ?>
                        <?php if ($count%4 == 1 ) {  ?>
                            <div class="sh-col-3 panelist-tile"></div>
                            <div class="sh-col-3 panelist-tile"></div>
                            <div class="sh-col-3 panelist-tile"></div>
                        <?php }  else if ($count%4 == 2 )  { ?>
                            <div class="sh-col-3 panelist-tile"></div>
                            <div class="sh-col-3 panelist-tile"></div>
                        <?php }  else if ($count%4 == 3 )  { ?>
                            <div class="sh-col-3 panelist-tile"></div>
                        <?php }  
                   
            } // end while
        } // end if

        // Restore original Post Data
        wp_reset_postdata();
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
									<img src="<?php the_post_thumbnail_url('small');  ?>"class="speaker-popup__foto">	
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

