<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravis-Themes
 */
$post_author_box_info = festiva()->get_theme_opt( 'post_author_box_info', true );
$post_author_position = festiva()->get_theme_opt( 'post_author_position' );
$link_facebook = festiva()->get_theme_opt('link_facebook', '');
$link_instagram = festiva()-> get_theme_opt('link_instagram','');
$link_twitter = festiva()->get_theme_opt('link_twitter', '');
$link_pinterest = festiva()->get_theme_opt('link_pinterest', '');
$sg_featured_img_size = festiva()->get_theme_opt('sg_featured_img_size', '1200x672');
$link_linkedin = festiva()->get_theme_opt('link_linkedin', '');
$post_social_share_social = festiva()->get_theme_opt('post_social_share_social', '');
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl---post'); ?>>
    <?php if (has_post_thumbnail()) {
         $img  = pxl_get_image_by_size( array(
            'attach_id'  => get_post_thumbnail_id($post->ID),
            'thumb_size' => $sg_featured_img_size,
        ) );
        $thumbnail    = $img['thumbnail'];
        echo '<div class="pxl-item--image">'; ?>
        <?php echo pxl_print_html($thumbnail); ?>

        <?php //the_post_thumbnail('festiva-large'); ?>
        <?php echo '</div>';
    }?>

    <div class="pxl-item--holder">
        <?php festiva()->blog->get_post_metas(); ?>
        <div class="pxl-item--content clearfix">
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>', 
            ) );
            ?>
        </div>
        <?php if ($post_social_share_social): ?>
            <?php festiva()->blog->get_socials_share(); ?>
        <?php endif ?>
        <?php if($post_author_box_info) : ?>
           <div class="pxl-author--info">
            <div class="entry-author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
            </div>
            <div class="entry-author-meta">

                <h5 class="author-name">
                    <?php the_author_posts_link(); ?>
                </h5>
                <?php if(!empty($post_author_position)) : ?>
                   <div class="author-description">
                    <?php echo esc_attr( $post_author_position ); ?>
                </div>
            <?php endif; ?>
            <div class="wrap-social">
                <?php if($link_facebook) : ?>
                    <span class="fb"><a href="<?php echo esc_attr($link_facebook)?>"><i class="fab fa-facebook-f"></i></a></span>
                <?php endif; ?>
                <?php if($link_instagram) : ?>
                    <span class="ins"><a href="<?php echo esc_attr($link_instagram)?>"><i class="fab fa-instagram"></i></a></span>
                <?php endif; ?>
                <?php if($link_twitter) : ?>
                    <span class="tt"><a href="<?php echo esc_attr($link_twitter)?>"><i class="fab fa-twitter"></i></a></span>
                <?php endif; ?>
                <?php if($link_linkedin) : ?>
                    <span class="linked"><a href="<?php echo esc_attr($link_linkedin)?>"><i class="fab fa-linkedin-in"></i> </a></span>
                <?php endif; ?>
                <?php if($link_pinterest) : ?>
                    <span class="pin"><a href="<?php echo esc_attr($link_pinterest)?>"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.42479 2.53139C3.86033 1.09585 5.60348 0.378085 7.65425 0.378085C9.70502 0.378085 11.4482 1.09585 12.8837 2.53139C14.3192 3.96693 15.037 5.71008 15.037 7.76085C15.037 9.81162 14.3192 11.5548 12.8837 12.9903C11.4482 14.4258 9.70502 15.1436 7.65425 15.1436C5.60348 15.1436 3.86033 14.4258 2.42479 12.9903C0.989253 11.5548 0.271484 9.81162 0.271484 7.76085C0.271484 5.71008 0.989253 3.96693 2.42479 2.53139ZM12.3454 3.76185C11.7045 4.71033 10.615 5.53064 9.07697 6.22277C9.23078 6.55602 9.3974 6.95336 9.57684 7.41478C11.0124 7.28661 12.4223 7.26098 13.8066 7.33788C13.7297 5.97925 13.2426 4.78724 12.3454 3.76185ZM7.65425 1.60855C7.21846 1.60855 6.71859 1.67263 6.15463 1.80081C6.92366 2.56984 7.71834 3.68495 8.53864 5.14612C9.92291 4.58216 10.9355 3.87721 11.5763 3.03127C10.4228 2.08279 9.11542 1.60855 7.65425 1.60855ZM4.88571 2.30068C3.2451 3.14662 2.18126 4.4668 1.6942 6.26123H2.6555C4.32175 6.26123 5.87264 6.04333 7.30818 5.60754C6.56478 4.27454 5.75729 3.17226 4.88571 2.30068ZM1.50195 7.45324V7.76085C1.50195 9.32456 2.01464 10.6832 3.04002 11.8368C4.01414 10.0167 5.57785 8.65806 7.73115 7.76085C7.85933 7.70958 8.03877 7.65831 8.26948 7.60704C8.11567 7.19689 7.9875 6.88927 7.88496 6.6842C6.34688 7.17125 4.5781 7.44042 2.5786 7.49169C2.47606 7.49169 2.29662 7.49169 2.04027 7.49169C1.78393 7.46605 1.60448 7.45324 1.50195 7.45324ZM7.65425 13.9132C8.44892 13.9132 9.17951 13.785 9.84601 13.5286C9.71784 12.452 9.52558 11.4394 9.26923 10.4909C9.16669 10.0551 8.96161 9.4271 8.654 8.60679C8.34638 8.6837 8.12849 8.7606 8.00032 8.8375C6.07772 9.70908 4.70627 10.9652 3.88596 12.6058C5.01389 13.4774 6.26998 13.9132 7.65425 13.9132ZM10.9611 12.9134C12.653 11.8111 13.5887 10.3243 13.7681 8.45298C12.2557 8.35045 10.9867 8.35045 9.96136 8.45298C10.2433 9.24766 10.3972 9.73471 10.4228 9.91416C10.6535 10.8114 10.8329 11.8111 10.9611 12.9134Z" fill="#ff2883"/>
                    </svg>
                </a></span>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php endif; ?>
</div>
</article>
