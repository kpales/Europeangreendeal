<?php
/**
 * Block template file: template-parts/blocks/full-width-image-slider.php
 *
 * Full Width Image Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-image-slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-full-width-image-slider';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

	<?php if( have_rows('all_slider_images') ): ?>
		<div class="site-outer">

			<!-- Swiper -->
			<div class="swiper-header-container">

					<div class="swiper-wrapper">

					<?php while( have_rows('all_slider_images') ): the_row();
						// vars
							$slide_img = get_sub_field('image');
							$slide_heading = get_sub_field('teaser'); ?>

						<div class="swiper-slide">
							<img class="full-width-slider-image" src="<?php echo($slide_img['url']);?>" alt="<?php echo $slide_img['image']['alt']; ?>">
							<div class="full-width-slider">
								<div class="full-width-slider__heading"><?php echo $slide_heading; ?></div>
							</div>
						</div>
					<?php endwhile; ?>

					</div>

				<!-- Add Arrows -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

		</div>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>

</div>

