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

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <?php if ( have_rows( 'panelists' ) ) : ?>
        <div class="sh-container">
            <div class="sh-row">
                <?php while ( have_rows( 'panelists' ) ) : the_row(); ?>
                    <div class="sh-col-3 panelist-tile">
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php if ( $image ) : ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
                        <div class="panelist-name"><?php echo get_sub_field( 'name' ); ?></div>

                    </div>
                    <?php if (get_row_index()%4 == 0)  { ?> 
                        </div> <!-- end row -->
                        <div class="sh-row"> <!-- start row -->
                    <?php } ?> 
                <?php endwhile; ?>
                <?php  $count = count(get_field('panelists')); ?>
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
                     <?php }  ?>
                <?php }  ?>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>
</div>