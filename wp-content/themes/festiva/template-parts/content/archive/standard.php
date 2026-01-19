<?php
/**
 * @package Bravis-Themes
 */
$archive_readmore_text = festiva()->get_theme_opt('archive_readmore_text', esc_html__('Read More', 'festiva'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl---post pxl-item--archive pxl-item--standard'); ?>>
    <?php
if (has_post_format('quote')) {
    $quote_text = get_post_meta(get_the_ID(), 'featured-quote-text', true);
    ?>
    <div class="pxl-item--image quote-inner">
        <blockquote>
            <p class="quote-text"><?php echo esc_html($quote_text); ?></p>
        </blockquote>
    </div>
    <?php
} elseif (has_post_thumbnail()) {
    ?>
    <div class="pxl-item--image">
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <?php the_post_thumbnail('festiva-large'); ?>
        </a>
    </div>
    <?php
}
?>
    <div class="pxl-item--holder">
        <?php festiva()->blog->get_archive_meta(); ?>
        <div class="inner-content">
            <h3 class="pxl-item--title">
                <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if(is_sticky()) { ?>
                        <i class="caseicon-check-mark pxl-mr-4"></i>
                    <?php } ?>
                    <?php the_title(); ?>
                </a>
            </h3>
            <div class="pxl-item--excerpt">
                <?php
                festiva()->blog->get_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
                ?>
            </div>
            <div class="pxl-item--readmore">
                <a class="btn-readmore" href="<?php echo esc_url( get_permalink()); ?>">
                    <span><?php echo festiva_html($archive_readmore_text); ?></span>
                    <i class="flaticon flaticon-arrow-2"></i>
                </a>
            </div>
        </div>
    </div>
</article>