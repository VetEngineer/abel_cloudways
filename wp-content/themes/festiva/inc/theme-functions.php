<?php
/**
 * Helper functions for the theme
 *
 * @package Bravis-Themes
 */


function festiva_html($html){
    return $html;
}

/**
 * Google Fonts
*/
function festiva_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    if ( 'off' !== _x( 'on', 'Syne font: on or off', 'festiva' ) ) {
        $fonts[] = 'Syne:ital,wght@0,400;0,500;0,600;0,700';
    }

    if ( 'off' !== _x( 'on', 'Plus Jakarta Sans font: on or off', 'festiva' ) ) {
        $fonts[] = 'Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
    }

    if ( 'off' !== _x( 'on', 'Inter font: on or off', 'festiva' ) ) {
        $fonts[] = 'Inter:wght@100;200;300;400;500;600;700;800;900';
    }

    if ( 'off' !== _x( 'on', 'Nunito Sans font: on or off', 'festiva' ) ) {
        $fonts[] = 'Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700';
    }
    
    if ( 'off' !== _x( 'on', 'Manrope font: on or off', 'festiva' ) ) {
        $fonts[] = 'Manrope:wght@200;300;400;500;600;700;800';
    }

    if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'festiva' ) ) {
        $fonts[] = 'Oswald:ital,wght@0,400;0,500;0,600;0,700';
    }

    if ( 'off' !== _x( 'on', 'Outfit font: on or off', 'festiva' ) ) {
        $fonts[] = 'Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap';
    }

    if ( 'off' !== _x( 'on', 'Bebas Neue font: on or off', 'festiva' ) ) {
        $fonts[] = 'Bebas+Neue&display=swap';
    }

    if ( 'off' !== _x( 'on', 'DM Sans font: on or off', 'festiva' ) ) {
        $fonts[] = 'DM+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap';
    }

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $fonts ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css2' );
    }
    return $fonts_url;
}

/*
 * Get page ID by Slug
*/
function festiva_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Show content by slug
 **/
function festiva_content_by_slug($slug, $post_type){
    $content = festiva_get_content_by_slug($slug, $post_type);

    $id = festiva_get_id_by_slug($slug, $post_type);
    echo apply_filters('the_content',  $content);
}

/**
 * Get content by slug
 **/
function festiva_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else
        return;
}


/**
 * Custom Comment List
 */
function festiva_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="comment-inner">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 90); ?>
            <div class="comment-content">
              <h4 class="comment-title">
               <?php printf( '%s', get_comment_author_link() ); ?>
               <span class="comment-date">
                <?php echo get_comment_date('F,d Y'); ?>
            </span>
        </h4>
        <div class="comment-text"><?php comment_text(); ?></div>
        <div class="comment-reply">
            <?php comment_reply_link( array_merge( $args, array(
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth']
            ) ) ); ?>
        </div>

    </div>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif;
}

/**
 * Paginate Links
 */
function festiva_ajax_paginate_links($link){
    $parts = parse_url($link);
    if( !isset($parts['query']) ) return $link;
    parse_str($parts['query'], $query);
    if(isset($query['page']) && !empty($query['page'])){
        return '#' . $query['page'];
    }
    else{
        return '#1';
    }
}


/**
 * RGB Color
 */
function festiva_hex_rgb($color) {

    $default = '0,0,0';
    
    //Return default if no color provided
    if(empty($color))
        return $default; 
    
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    $output = implode(",",$rgb);

    //Return rgb(a) color string
    return $output;
}


/**
 * Image Size Crop
 */
if(!function_exists('festiva_get_image_by_size')){
    function festiva_get_image_by_size( $params = array() ) {
        $params = array_merge( array(
            'post_id' => null,
            'attach_id' => null,
            'thumb_size' => 'thumbnail',
            'class' => '',
        ), $params );

        if ( ! $params['thumb_size'] ) {
            $params['thumb_size'] = 'thumbnail';
        }

        if ( ! $params['attach_id'] && ! $params['post_id'] ) {
            return false;
        }

        $post_id = $params['post_id'];

        $attach_id = $post_id ? get_post_thumbnail_id( $post_id ) : $params['attach_id'];
        $attach_id = apply_filters( 'pxl_object_id', $attach_id );
        $thumb_size = $params['thumb_size'];
        $thumb_class = ( isset( $params['class'] ) && '' !== $params['class'] ) ? $params['class'] . ' ' : '';

        global $_wp_additional_image_sizes;
        $thumbnail = '';

        $sizes = array(
            'thumbnail',
            'thumb',
            'medium',
            'medium_large',
            'large',
            'full',
        );
        if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[ $thumb_size ] ) && is_array( $_wp_additional_image_sizes[ $thumb_size ] ) ) || in_array( $thumb_size, $sizes, true ) ) ) {
            $attributes = array( 'class' => $thumb_class . 'attachment-' . $thumb_size );
            $thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, $attributes );
            $thumbnail_url = wp_get_attachment_image_url($attach_id, $thumb_size, false);
        } elseif ( $attach_id ) {
            if ( is_string( $thumb_size ) ) {
                preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
                if ( isset( $thumb_matches[0] ) ) {
                    $thumb_size = array();
                    $count = count( $thumb_matches[0] );
                    if ( $count > 1 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][1]; // height
                    } elseif ( 1 === $count ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][0]; // height
                    } else {
                        $thumb_size = false;
                    }
                }
            }
            if ( is_array( $thumb_size ) ) {
                // Resize image to custom size
                $p_img = pxl_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
                $alt = trim( wp_strip_all_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );
                $attachment = get_post( $attach_id );
                if ( ! empty( $attachment ) ) {
                    $title = trim( wp_strip_all_tags( $attachment->post_title ) );

                    if ( empty( $alt ) ) {
                        $alt = trim( wp_strip_all_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
                    }
                    if ( empty( $alt ) ) {
                        $alt = $title;
                    }
                    if ( $p_img ) {

                        $attributes = pxl_stringify_attributes( array(
                            'class' => $thumb_class,
                            'src' => $p_img['url'],
                            'width' => $p_img['width'],
                            'height' => $p_img['height'],
                            'alt' => $alt,
                            'title' => $title,
                        ) );

                        $thumbnail = '<img ' . $attributes . ' />';
                    }
                }
            }
            $thumbnail_url = $p_img['url'];
        }

        $p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );

        return apply_filters( 'pxl_el_getimagesize', array(
            'thumbnail' => $thumbnail,
            'url' => $thumbnail_url,
            'p_img_large' => $p_img_large,
        ), $attach_id, $params );

    }
}

/**
 * Search Form
 */
function festiva_header_mobile_search_form() { 
    $search_mobile = festiva()->get_theme_opt( 'search_mobile', false );
    $search_placeholder_mobile = festiva()->get_theme_opt( 'search_placeholder_mobile' );
    if($search_mobile) : ?>
        <div class="pxl-header-mobile-search pxl-hide-xl">
            <form method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php if(!empty($search_placeholder_mobile)) { echo esc_attr($search_placeholder_mobile); } else { esc_attr_e('Search...', 'festiva'); } ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit"><i class="caseicon-search"></i></button>
            </form>
        </div>
    <?php endif; }

/**
 * Year Shortcode [pxl_year]
 */
if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_year_shortcode() {
        ob_start(); ?>
        <span><?php the_date('Y'); ?></span>
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_year', 'festiva_year_shortcode');
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_text_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
     ), $atts));

        ob_start();
        if(!empty($text)) : 
            $arr_str = explode(',', $text);
            ?>
            <span class="pxl-title--highlight">
                <?php foreach ($arr_str as $index => $value) {
                    $item_count = '';
                    if($index == 0) {
                        $item_count = 'active';
                    }
                    $arr_str[$index] = '<span class="pxl-item--text '.$item_count.'">' . $value . '</span>';
                }
                $str = implode(' ', $arr_str);
                echo wp_kses_post($str); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('highlight', 'festiva_text_highlight_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_text_highlight_shortcode_editor( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
     ), $atts));

        ob_start();
        if(!empty($text)) : ?>
            <span class="pxl-text--highlight">
                <?php echo esc_attr($text); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_highlight', 'festiva_text_highlight_shortcode_editor');
}

/* Typewriter Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_text_typewriter_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
     ), $atts));

        ob_start();
        if(!empty($text)) : 
            $arr_str = explode(',', $text);
            ?>
            <span class="pxl-title--typewriter">
                <?php foreach ($arr_str as $index => $value) {
                    $item_count = '';
                    if($index == 0) {
                        $item_count = 'is-active';
                    }
                    $arr_str[$index] = '<span class="pxl-item--text '.$item_count.'">' . $value . '</span>';
                }
                $str = implode(' ', $arr_str);
                echo wp_kses_post($str); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('typewriter', 'festiva_text_typewriter_shortcode');
}

/* Button Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_btn_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
         'style' => 'btn-slider1',
         'icon_class' => '',
         'link' => '',
         'text_color' => '',
     ), $atts));

        ob_start();
        if(!empty($text)) : ?>
            <?php if(!empty($link)) : ?><a class="sc-button-wrap" href="<?php echo esc_url($link); ?>"><?php endif; ?>
            <span class="btn <?php echo esc_attr($style); ?> <?php if($style == 'btn-slider1') { echo 'btn-nina'; } ?> <?php if($style == 'btn-slider4') { echo 'btn-nanuk'; } ?>" <?php if(!empty($text_color)) { ?>style="color: <?php echo esc_attr($text_color); ?>"<?php } ?>>
                <?php if($style == 'btn-slider1' || $style == 'btn-slider4') { ?>
                    <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                        <?php $chars = str_split($text);
                        foreach ($chars as $value) {
                            if($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>'.esc_attr($value).'</span>';
                            }
                        } ?>
                    </span>
                <?php } else {
                    echo '<span>'.esc_attr($text).'</span>';
                } ?>
                <?php if(!empty($icon_class)) : ?>
                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                <?php endif; ?>
                <?php if($style == 'pxl-btn-effect14') { ?>
                    <span class="pxl-btn-divider pxl-btn-divider1"></span>
                    <span class="pxl-btn-divider pxl-btn-divider2"></span>
                <?php } ?>
            </span>
            <?php if(!empty($link)) : ?></a><?php endif; ?>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button', 'festiva_btn_shortcode');
}

/* Gallery Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_gallery_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'link' => '#',
         'images_id' => '',
         'cols' => '2',
         'img_size' => 'full',
         'btn_video' => 'no',
         'masonry' => '',
     ), $atts));

        ob_start();
        ?>
        <div class="pxl-gallery gallery-<?php echo esc_attr($cols); ?>-columns <?php if(!empty($masonry)) { echo 'masonry-'.esc_attr($masonry); } ?>">
            <?php
            $pxl_images = explode( ',', $images_id );
            foreach ($pxl_images as $key => $img_id) :
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $thumbnail_url = $img['url'];
                ?>
                <div class="pxl--item">
                    <div class="pxl--item-inner <?php if($key == 1 && !empty($link) && $btn_video == 'yes' ) { echo 'video-active'; } ?>">
                        <a href="<?php echo esc_url($thumbnail_url); ?>"><?php echo festiva_html($thumbnail); ?></a>
                        <?php if($key == 1 && $btn_video == 'yes') : ?>
                            <a href="<?php echo esc_url($link); ?>" class="btn-video"><i class="fa fa-play"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_gallery', 'festiva_gallery_shortcode');
}

/* Addd shortcode Video button */
if(function_exists( 'pxl_register_shortcode' )) {
    function festiva_video_button_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'link' => '',
         'text' => '',
         'class' => 'style1',
     ), $atts));

        ob_start();
        ?>
        <a href="<?php echo esc_url($link); ?>" class="pxl-button-video1 btn-video pxl-video-popup <?php echo pxl_print_html($class); ?>">
            <span>
                <i class="caseicon-play1"></i>
            </span>
            <?php if(!empty($text)) : ?>
                <span class="slider-video-title"><?php echo pxl_print_html($text); ?></span>
            <?php endif; ?>
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_video_button', 'festiva_video_button_shortcode');
}

/**
 * Custom Widget Categories - Count
 */
add_filter('wp_list_categories', 'festiva_wg_category_count');
function festiva_wg_category_count($output) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $output = str_replace("\t", '', $output);
    $output = str_replace(")\n</li>", ')</li>', $output);
    $output = str_replace('</a> (', '<span class="pxl-count pxl-r-15 '.$dir.'"> (', $output);
    $output = str_replace(")</li>", ") </span></a></li>", $output);
    $output = str_replace("\n<ul", "</span></a>\n<ul", $output);
    return $output;
}


/**
 * Custom Widget Archive - Count
 */
add_filter('get_archives_link', 'festiva_wg_archive_count');
function festiva_wg_archive_count($links) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $links = str_replace('</a>&nbsp;(', ' <span class="pxl-count pxl-r-15 '.$dir.'">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}

/**
 * Custom Widget Product Categories 
 */
add_filter('wp_list_categories', 'festiva_wc_cat_count_span');
function festiva_wc_cat_count_span($links) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $links = str_replace('</a> <span class="count">(', ' <span class="pxl-count pxl-r-15 '.$dir.'">', $links);
    $links = str_replace(')</span>', '</span></a>', $links);
    return $links;
}

/**
 * Get mega menu builder ID
 */
function festiva_get_mega_menu_builder_id(){
    $mn_id = [];
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $menus ) && ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            if ( is_object( $menu )){
                $menu_obj = get_term( $menu->term_id, 'nav_menu' );
                $menu = wp_get_nav_menu_object( $menu_obj ) ;
                $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
                foreach ($menu_items as $menu_item) {
                    if( !empty($menu_item->pxl_megaprofile)){
                        $mn_id[] = (int)$menu_item->pxl_megaprofile;
                    }
                }  
            }
        }
    }
    return $mn_id;
}

/**
 * Get page popup builder ID
 */
function festiva_get_page_popup_builder_id(){
    $pp_id = [];
    $page_popup = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $page_popup ) && ! empty( $page_popup ) ) {
        foreach ( $page_popup as $page ) {
            if ( is_object( $page )){
                $page_obj = get_term( $page->term_id, 'nav_menu' );
                $page = wp_get_nav_menu_object( $page_obj ) ;
                $page_items = wp_get_nav_menu_items( $page->term_id, array( 'update_post_term_cache' => false ) );
                foreach ($page_items as $page_item) {
                    if( !empty($page_item->pxl_page_popup)){
                        $pp_id[] = (int)$page_item->pxl_page_popup;
                    }
                }  
            }
        }
    }
    return $pp_id;
}

/* Mouse Move Animation */
function festiva_mouse_move_animation() { 
    $mouse_move_animation = festiva()->get_theme_opt('mouse_move_animation', false); 
    $mouse_move_style = festiva()->get_theme_opt( 'mouse_move_style', 'style-default' );
    if($mouse_move_animation) {
        wp_enqueue_script( 'festiva-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array( 'jquery' ), '1.0.0', true ); ?>  
        <div class="pxl-cursor pxl-js-cursor <?php echo esc_attr($mouse_move_style); ?>">
            <div class="pxl-cursor-wrapper">
                <div class="pxl-cursor--follower pxl-js-follower"></div>
                <div class="pxl-cursor--label pxl-js-label"></div>
                <div class="pxl-cursor--drap pxl-js-drap"></div>
                <div class="pxl-cursor--icon pxl-js-icon"></div>
            </div>
        </div>
        <div class="pxl-cursor-section"></div>
    <?php }
}

/**
 * Start - User custom fields.
 */
add_action( 'show_user_profile', 'festiva_user_fields' );
add_action( 'edit_user_profile', 'festiva_user_fields' );
function festiva_user_fields($user){

    $user_position = get_user_meta($user->ID, 'user_position', true);

    ?>
    <h3><?php esc_html_e('Theme Custom', 'festiva'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_position"><?php esc_html_e('Position', 'festiva'); ?></label></th>
            <td>
                <input id="user_position" name="user_position" type="text" value="<?php echo esc_attr(isset($user_position) ? $user_position : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'festiva_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'festiva_save_user_custom_fields' );
function festiva_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_position']))
        update_user_meta( $user_id, 'user_position', $_POST['user_position'] );
}

function festiva_get_user_theme() {

    $user_position = get_user_meta(get_the_author_meta( 'ID' ), 'user_position', true);
    if(!empty($user_position)) { ?>
        <div class="pxl-user--position">
            <?php echo esc_attr($user_position); ?>
        </div>
    <?php }
}
/**
 * End - User custom fields.
 */


/**
 * Start - Cookie Policy
 */
function festiva_cookie_policy() {
    $cookie_policy = festiva()->get_theme_opt('cookie_policy', 'hide');
    $cookie_policy_description = festiva()->get_theme_opt('cookie_policy_description');
    $cookie_policy_btntext = festiva()->get_theme_opt('cookie_policy_btntext');
    $cookie_policy_link = get_permalink(festiva()->get_theme_opt('cookie_policy_link')); 
    wp_enqueue_script('pxl-cookie'); ?>
    <?php if($cookie_policy == 'show' && !empty($cookie_policy_description)) : ?>
        <div class="pxl-cookie-policy">
            <div class="pxl-item--icon pxl-mr-8"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/cookie.png'); ?>" alt="<?php echo esc_attr($cookie_policy_btntext); ?>" /></div>
            <div class="pxl-item--description">
                <?php echo esc_attr($cookie_policy_description); ?>
                <a class="pxl-item--link" href="<?php echo esc_url( $cookie_policy_link ); ?>" target="_blank"><?php echo pxl_print_html($cookie_policy_btntext); ?></a>
            </div>
            <div class="pxl-item--close pxl-close"></div>
        </div>
    <?php endif; ?>
<?php }   
/**
 * End - Cookie Policy
 */

/**
 * Start - Subscribe Popup
 */
function festiva_subscribe_popup() {
    $subscribe = festiva()->get_theme_opt('subscribe', 'hide');
    $subscribe_layout = festiva()->get_theme_opt('subscribe_layout');
    $popup_effect = festiva()->get_theme_opt('popup_effect', 'fade');
    $args = [
        'subscribe_layout' => $subscribe_layout
    ];
    wp_enqueue_script('pxl-cookie'); ?>
    <?php if($subscribe == 'show' && isset($args['subscribe_layout']) && $args['subscribe_layout'] > 0) : ?>
        <div class="pxl-popup pxl-subscribe-popup pxl-effect-<?php echo esc_attr($popup_effect); ?>">
            <div class="pxl-popup--content">
                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['subscribe_layout']); ?>
            </div>
        </div>
    <?php endif; ?>
<?php }   
/**
 * End - Subscribe Popup
 */

/**
 * Start - Page Popup
 */
function festiva_page_popup() {
    $post_list = array();
    $args = array(
        'post_type' => 'pxl-template',
        'posts_per_page' => '-1',
        'orderby' => 'date',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key'       => 'template_type',
                'value'     => 'page',
                'compare'   => '='
            )
        )
    );
    $posts = get_posts($args); ?>
    <div id="pxl-page-popup" class="">
        <div class="pxl-popup-overlay"></div>
        <div class="pxl-page-popup-content">
            <?php foreach($posts as $post){ ?>
                <div id="pxl-page-popup-<?php echo esc_attr($post->ID); ?>" class="pxl-page-item">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($post->ID); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }   
/**
 * End - Page Popup
 */