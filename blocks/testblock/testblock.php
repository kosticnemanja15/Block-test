<?php
/**
 * Test Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'test-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$block_title     = get_field( 'block_title' );
$background_color = get_field( 'background_color' );
$text_color       = get_field( 'text_color' );

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );

?>


<!-- <div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>"> -->
    <div class="block-title-holder">
        <h2 class="block-title"><?php echo esc_html( $block_title ); ?></h2>
    </div><!-- block-title-holder -->
       <div class="grid">
            <?php if( have_rows('block_grid') ): ?>

                <?php while( have_rows('block_grid') ): the_row();?>

                    <div class="single-block">                 
                        <div class="image-holder">
                            <img src="<?php the_sub_field('image'); ?>">
                        </div>
                        <h3><?php the_sub_field('title'); ?></h3>  
                        <p><?php the_sub_field('text'); ?> </p> 
                        <a href="<?php the_sub_field('button_link'); ?>"><button>More Info</button></a>     
                    </div><!-- single-block -->

                <?php endwhile; ?>

            <?php endif; ?>
       </div><!-- grid -->
<!-- </div> -->