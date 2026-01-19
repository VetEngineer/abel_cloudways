<?php

if (!class_exists('Festiva_Page')) {

    class Festiva_Page
    {
        public function get_site_loader()
        {
            $site_loader = festiva()->get_opt('site_loader', false);
            $loader_style = festiva()->get_theme_opt('loader_style', 'style-default');
            $gradient_color = festiva()->get_opt('gradient_color');
            $loader_text = festiva()->get_opt('loader_text');
            $loading_text = festiva()->get_opt('loading_text');
            $loading_text2 = festiva()->get_opt('loading_text2');
            $loader_text_color = festiva()->get_opt('loader_text_color');
            $logo_loader = festiva()->get_opt('logo_loader', ['url' => get_template_directory_uri() . '/assets/img/logo.png', 'id' => '']);

            if ($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader <?php echo esc_attr($loader_style); ?>">
                    <div class="pxl-loader-effect">
                        <?php
                        switch ($loader_style) {
                            case 'style-business':
                                // Business style logic
                                break;

                            case 'style-fashion': ?>
                                <div class="pxl-loader-inner">
                                    <div class="wrap-inner">
                                        <div class="spinner"><span></span></div>
                                        <?php if (!empty($loading_text) || !empty($loading_text2)) { ?>
                                            <div class="loading-text">
                                                <?php
                                                $characters = mb_str_split($loading_text);
                                                $characters2 = mb_str_split($loading_text2);
                                                foreach ($characters2 as $character) {
                                                    $encoded_character = htmlspecialchars($character, ENT_COMPAT, 'UTF-8', false);
                                                    echo '<span class="pri" data-text="' . $encoded_character . '">' . $encoded_character . '</span>';
                                                }
                                                foreach ($characters as $character) {
                                                    $encoded_character = htmlspecialchars($character, ENT_COMPAT, 'UTF-8', false);
                                                    echo '<span data-text="' . $encoded_character . '">' . $encoded_character . '</span>';
                                                }
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                                break;

                            case 'style-software': ?>
                                <div class="pxl-bounce-1"></div>
                                <div class="pxl-bounce-2"></div>
                                <?php
                                break;

                            case 'style-seo': ?>
                                <div class="pxl-loader-rotate pxl-rotate-1"></div>
                                <div class="pxl-loader-rotate pxl-rotate-2"></div>
                                <div class="pxl-loader-rotate pxl-rotate-3"></div>
                                <?php
                                break;

                            case 'style-insurance': ?>
                                <div class="pxl-leaf-1"></div>
                                <div class="pxl-leaf-2"></div>
                                <div class="pxl-leaf-3"></div>
                                <div class="pxl-leaf-4"></div>
                                <?php
                                break;

                            case 'style-architecture': ?>
                                <div class="pxl-loader-bar"><?php echo get_bloginfo(); ?></div>
                                <?php
                                break;

                            case 'style-law': ?>
                                <div class="pxl-loader-holder type-color-<?php echo esc_attr($loader_text_color); ?>">
                                    <div class="pxl-loader-text"><?php echo !empty($loader_text) ? esc_attr($loader_text) : esc_html__('A', 'festiva'); ?></div>
                                    <div class="pxl-loader-overlay"></div>
                                </div>
                                <?php
                                break;

                            case 'style-wave':
                                for ($i = 0; $i < 10; $i++) { ?>
                                    <div class="pxl-wave"></div>
                                <?php }
                                break;

                            default: ?>
                                <div class="pxl-circle-1"></div>
                                <div class="pxl-circle-2"></div>
                                <?php
                                break;
                        }
                        ?>
                    </div>
                    <?php if ($loader_style == 'style-digital') : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                            <defs>
                                <filter id="pxl-svg-digital">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 0 18 -7" result="pxl-svg-digital" />
                                    <feBlend in="SourceGraphic" in2="pxl-svg-digital" />
                                </filter>
                            </defs>
                        </svg>
                    <?php endif; ?>
                </div>
            <?php }
        }

        public function get_link_pages()
        {
            wp_link_pages(array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));
        }

        public function get_page_title()
        {
            $titles = $this->get_title();
            $pt_mode = festiva()->get_opt('pt_mode');
            if ($pt_mode == 'none') return;

            $ptitle_layout = (int)festiva()->get_opt('ptitle_layout');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable('Elementor\Plugin::instance')) {
                ?>
                <div id="pxl-page-title-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($ptitle_layout); ?>
                </div>
                <?php
            } else {
                $ptitle_breadcrumb_on = festiva()->get_opt('ptitle_breadcrumb_on', '1');
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default" class="pxl--parallax" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="pxl-page-title"><?php echo festiva_html($titles['title']); ?></h1>
                            </div>
                            <div class="col-sm-12">
                                <?php if ($ptitle_breadcrumb_on == '1') : ?>
                                    <?php $this->get_breadcrumb(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_title()
        {
            $title = '';
            if (!is_archive()) {
                if (is_home()) {
                    if (!is_front_page() && $page_for_posts = get_option('page_for_posts')) {
                        $title = get_post_meta($page_for_posts, 'custom_title', true);
                        if (empty($title)) {
                            $title = get_the_title($page_for_posts);
                        }
                    }
                    if (is_front_page()) {
                        $title = esc_html__('Blog', 'festiva');
                    }
                } elseif (is_page()) {
                    $title = get_post_meta(get_the_ID(), 'custom_title', true);
                    if (!$title) {
                        $title = get_the_title();
                    }
                } elseif (is_404()) {
                    $title = esc_html__('404 Error', 'festiva');
                } elseif (is_search()) {
                    $title = esc_html__('Search results', 'festiva');
                } elseif (is_singular('lp_course')) {
                    $title = esc_html__('Course', 'festiva');
                } else {
                    $title = get_post_meta(get_the_ID(), 'custom_title', true);
                    if (!$title) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if (class_exists('WooCommerce') && is_shop()) {
                    $title = get_post_meta(wc_get_page_id('shop'), 'custom_title', true);
                    if (!$title) {
                        $title = get_the_title(get_option('woocommerce_shop_page_id'));
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb()
        {
            if (!class_exists('CASE_Breadcrumb')) {
                return;
            }

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if (empty($entries)) {
                return;
            }

            ob_start();

            foreach ($entries as $entry) {
                $entry = wp_parse_args($entry, array(
                    'label' => '',
                    'url'   => ''
                ));

                $entry_label = $entry['label'];

                if (!empty($_GET['blog_title'])) {
                    $blog_title = $_GET['blog_title'];
                    $custom_title = explode('_', $blog_title);
                    $entry_label = implode(' ', $custom_title);
                }

                if (empty($entry_label)) {
                    continue;
                }

                echo '<li>';

                if (!empty($entry['url'])) {
                    printf(
                        '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                        esc_url($entry['url']),
                        esc_attr($entry_label)
                    );
                } else {
                    $post_title = festiva()->get_theme_opt('post_title', 'default');
                    $post_title_text = festiva()->get_theme_opt('post_title_text');
                    if (is_singular('post') && $post_title == 'custom_text' && !empty($post_title_text)) {
                        $entry_label = $post_title_text;
                    }
                    printf('<span class="breadcrumb-entry">%s</span>', esc_html($entry_label));
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ($output) {
                printf('<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination($query = null, $ajax = false)
        {
            if ($ajax) {
                add_filter('paginate_links', 'festiva_ajax_paginate_links');
            }
            $classes = array();
            if (empty($query)) {
                $query = $GLOBALS['wp_query'];
            }

            if (empty($query->max_num_pages) || !is_numeric($query->max_num_pages) || $query->max_num_pages < 2) {
                return;
            }

            $paged = $query->get('paged', '');

            if (!$paged && is_front_page() && !is_home()) {
                $paged = $query->get('page', '');
            }

            $paged = $paged ? intval($paged) : 1;

            $pagenum_link = html_entity_decode(get_pagenum_link());
            $query_args = array();
            $url_parts = explode('?', $pagenum_link);

            if (isset($url_parts[1])) {
                wp_parse_str($url_parts[1], $query_args);
            }

            $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
            $pagenum_link = trailingslashit($pagenum_link) . '%_%';
            $paginate_links_args = array(
                'base'      => $pagenum_link,
                'total'     => $query->max_num_pages,
                'current'   => $paged,
                'mid_size'  => 1,
                'add_args'  => array_map('urlencode', $query_args),
                'prev_text' => '<svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.795886 15.0864C0.581419 14.8806 0.460938 14.6015 0.460938 14.3104C0.460938 14.0194 0.581419 13.7403 0.795886 13.5345L6.45869 8.10182L0.795886 2.66914C0.587497 2.46215 0.472187 2.18491 0.474794 1.89715C0.4774 1.60938 0.597714 1.33411 0.809821 1.13063C1.02193 0.927138 1.30886 0.811715 1.60881 0.809215C1.90876 0.806714 2.19774 0.917338 2.4135 1.11726L8.88511 7.32588C9.09958 7.53169 9.22006 7.8108 9.22006 8.10182C9.22006 8.39284 9.09958 8.67194 8.88511 8.87776L2.4135 15.0864C2.19897 15.2921 1.90804 15.4077 1.60469 15.4077C1.30135 15.4077 1.01042 15.2921 0.795886 15.0864V15.0864Z" fill="#5f2dde"/></svg>',
                'next_text' => '<svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.795886 15.0864C0.581419 14.8806 0.460938 14.6015 0.460938 14.3104C0.460938 14.0194 0.581419 13.7403 0.795886 13.5345L6.45869 8.10182L0.795886 2.66914C0.587497 2.46215 0.472187 2.18491 0.474794 1.89715C0.4774 1.60938 0.597714 1.33411 0.809821 1.13063C1.02193 0.927138 1.30886 0.811715 1.60881 0.809215C1.90876 0.806714 2.19774 0.917338 2.4135 1.11726L8.88511 7.32588C9.09958 7.53169 9.22006 7.8108 9.22006 8.10182C9.22006 8.39284 9.09958 8.67194 8.88511 8.87776L2.4135 15.0864C2.19897 15.2921 1.90804 15.4077 1.60469 15.4077C1.30135 15.4077 1.01042 15.2921 0.795886 15.0864V15.0864Z" fill="#5f2dde"/></svg>',
            );
            if ($ajax) {
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links($paginate_links_args);
            if ($links) { ?>
                <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax ? 'ajax' : ''); ?>">
                    <div class="pxl-pagination-links">
                        <?php printf($links); ?>
                    </div>
                </nav>
            <?php }
        }
    }
}
