<?php
global $post;
$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
$next     = get_adjacent_post( false, '', false );
if ( ! $next && ! $previous ) {
    return;
}
$next_post = get_next_post();
$previous_post = get_previous_post();

if( !empty($next_post) || !empty($previous_post) ) { ?>
    <div class="pxl-pagination1">
        
        <div class="pxl--item item--prev">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                    <i class="flaticon-next-1 pxl-icon-reverse"></i>
                    <span><?php if(!empty($settings['prev_text'])) { echo esc_attr($settings['prev_text']); } else { echo esc_html__('Previous Project', 'festiva'); } ?></span>
                </a>
            <?php } ?>
        </div>
        
        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
            <div class="pxl--item item--next pxl-text-right">
                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                    <span><?php if(!empty($settings['next_text'])) { echo esc_attr($settings['next_text']); } else { echo esc_html__('Next Project', 'festiva'); } ?></span>
                    <i class="fa-solid fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>

    </div>
<?php } ?>