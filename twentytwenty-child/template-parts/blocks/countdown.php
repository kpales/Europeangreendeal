<?php
/**
 * Block template file: template-parts/blocks/countdown.php
 *
 * Countdown Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'countdown-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-countdown';
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
	<?php if ( get_field( 'countdown' ) == 1 ) {  ?>
     
     
     <div class="wrapper">
        <h1 style="text-align: center;"> Conference Countdown</h1>
    <time id="count-down" datetime="2020-05-06T00:00:00"></time>
    </div>

	<?php } else { 
	 // echo 'false'; 
	} ?>
</div>