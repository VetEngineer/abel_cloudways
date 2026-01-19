<?php

if (!class_exists('Festiva_Blog')) {

    class Festiva_Blog
    {
        public function get_archive_meta() {
            $archive_date = festiva()->get_theme_opt( 'archive_date', true );
            $archive_author = festiva()->get_theme_opt( 'archive_author', true );
            $author_id = get_the_author_meta('ID');
            $avatar = get_avatar($author_id, 100);
            if($archive_author || $archive_date) : ?>
                <div class="pxl-item--meta">
                    <?php if($archive_author) : ?>
                        <div class="pxl-item--author">
                            <?php echo ''.$avatar; ?>
                            <div class="info-author">
                                <div class="name"><?php the_author_posts_link(); ?></div>
                                <?php festiva_get_user_theme(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($archive_date) : ?>
                        <span class="pxl-item--date"><?php echo '<i class="flaticon flaticon-calendar-2"></i>'.get_the_date('F d,Y'); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; 
        }

        public function get_excerpt(){
            $archive_excerpt_length = festiva()->get_theme_opt('archive_excerpt_length', '50');
            $festiva_the_excerpt = get_the_excerpt();
            if(!empty($festiva_the_excerpt)) {
                echo wp_trim_words( $festiva_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = festiva()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'festiva' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'festiva_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }

        public function get_post_metas(){
            $post_date = festiva()->get_theme_opt( 'post_date', true );
            if($post_date) : ?>
                <div class="pxl-item-meta">
                    <?php if($post_date) : ?>
                        <span class="pxl-item-date"><?php echo get_the_date('F d,Y'); ?></span>
                    <?php endif; ?>
                </div>
                <h3 class="pxl-item--title-entry">
                        <?php if(is_sticky()) { ?>
                            <i class="caseicon-check-mark pxl-mr-4"></i>
                        <?php } ?>
                        <?php the_title(); ?>
                   
                </h3>
            <?php endif; 
        }

        public function festiva_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_tagged_in(){
            $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'festiva'). '</label>', ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = festiva()->get_theme_opt( 'social_facebook', true );
            $social_twitter = festiva()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = festiva()->get_theme_opt( 'social_pinterest', true );
            $social_google  = festiva()->get_theme_opt('social_google',true);
            $social_instagram  = festiva()->get_theme_opt('socical_instagram',true);




            // $social_linkedin = festiva()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <label for="">Share:</label>
                    <?php if($social_facebook) : ?>
                        <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'festiva'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">FaceBook</a>
                    <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'festiva'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">Twitter</a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'festiva'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">Pinterest</a>
                <?php endif; ?>
                <?php if($social_google) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Google+', 'festiva'); ?>" target="_blank" href="#/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">Google+</a>
                <?php endif; ?>
                <?php if($social_instagram) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Instagram', 'festiva'); ?>" target="_blank" href="http:/#/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">Instagram</a>
                <?php endif; ?>






                <!-- <?php //if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'festiva'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php //the_permalink(); ?>&title=<?php the_title(); ?>%20">Linkedin</a>
                <?php //endif; ?> -->
            </div>
            <?php
        }

        public function get_socials_share_portfolio() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
            <div class="pxl--social">
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'festiva'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'festiva'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'festiva'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'festiva'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
            </div>
            <?php
        }

        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'festiva-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="caseicon-double-chevron-left"></i><span><?php echo esc_html__('Previous Post', 'festiva'); ?></span></a>
                                <div class="pxl--holder">
                                    <?php if(!empty($prev_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl--meta">
                                        <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                $next_img_id = get_post_thumbnail_id($next_post->ID);
                                $next_img_url = wp_get_attachment_image_src($next_img_id, 'festiva-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next Post', 'festiva'); ?></span><i class="caseicon-double-chevron-right"></i></a>
                                <div class="pxl--holder">
                                    <div class="pxl--meta">
                                        <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                    </div>
                                    <?php if(!empty($next_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }
        public function get_project_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );
            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();
            $link_p_grid = festiva()->get_theme_opt( 'link_p_grid');
            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-project--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                ?>
                                <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                                    <i style="transform: scaleX(-1);" class="flaticon flaticon-long-arrow-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="link-post-grid">
                            <?php if (!empty($link_p_grid)) {?>
                                <a href="<?php echo esc_attr($link_p_grid) ?>">
                                    <i class="flaticon flaticon-grid"></i>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                ?>
                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                    <i class="flaticon flaticon-long-arrow-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }
        public function get_related_post(){
            $post_related = festiva()->get_theme_opt( 'post_related', false );

            if($post_related) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '2';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );

                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'festiva'); ?></h4>
                        <div class="class" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner ">
                                <?php foreach ($query_similar->posts as $post):
                                    $thumbnail_url = '';
                                    if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'festiva-portfolio', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-related-inner">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <div class="wrap-content-related">
                                                <h3 class="item-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <div class="post-date">
                                                    <?php echo get_the_date('d F Y'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php }
        }

        wp_reset_postdata();
    }
}
}
