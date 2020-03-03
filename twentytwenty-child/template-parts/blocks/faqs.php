<?php
/**
 * Block template file: 
 *
 * All Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'all-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-all';
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
<?php if ( have_rows( 'faqs' ) ) : ?>
    <div class="site-outer">
        <div class="site-inner site-inner--text site-inner--margin ">
            <div class="grid-x grid-margin-x">

                <?php while ( have_rows( 'faqs' ) ) : the_row(); ?>
                    <div class="cell small-12 faqs__item">
                        <div class="faqs__item__question ">
                             <div class="faqs__item__question__icon">
                                 <span class="show-more"> + </span> 
                                 <span class="show-less "> - </span>
                             </div>
                             <h5 class="heading-2 wrapper"> 
                                 <?php the_sub_field( 'frage' ); ?> 
                            </h5>
                        </div>

                        <div class="faqs__item__answer wrapper">
                            <?php the_sub_field( 'antwort' ); ?>
                        </div>
                    </div>
                    
                    
                <?php endwhile; ?>

            </div>  
        </div>
    </div>
    <?php endif; ?>

</div>