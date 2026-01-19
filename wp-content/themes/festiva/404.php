<?php
/**
 * @package Tnex-Themes
 */

$title_404 = festiva()->get_theme_opt('title_404');
$description_404 = festiva()->get_theme_opt('description_404');
$search_bar_404 = festiva()->get_theme_opt('search_bar_404',true);
$background_404 = festiva()->get_opt( 'background_404', ['url' => get_template_directory_uri().'/assets/img/bg-404.jpg', 'id' => '' ] );
get_header(); ?>
<div class="pxl-content--404" style="background-image:url(<?php echo esc_url($background_404['url']); ?>);">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="pxl-error-inner">
                    <div class="pxl-error-heading"><?php echo esc_html('404','festiva') ?></div>
                    <div class="pxl-error-holder">
                        <div class="wrap-error-holder">
                            <h3 class="pxl-error-title">
                                <?php if (!empty($title_404)) {
                                    echo pxl_print_html($title_404);
                                } else{
                                   echo esc_html__('PAGE NOT FOUND', 'festiva');
                               }?>
                           </h3>
                           <div class="pxl-error-description">
                            <?php if (!empty($description_404)) {
                                echo pxl_print_html($description_404);
                            } else{
                                echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'festiva');
                            }?>
                        </div>

                        <?php if ($search_bar_404) : ?>
                         <form  method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                            <div class="searchform-wrap">
                                <input type="text" placeholder="<?php esc_attr_e('Search Here..', 'festiva'); ?>" name="s" class="search-field" />
                                <button type="submit" class="search-submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8885 7.24965C12.8885 7.99016 12.7427 8.72342 12.4593 9.40756C12.1759 10.0917 11.7606 10.7133 11.237 11.237C10.7133 11.7606 10.0917 12.1759 9.40756 12.4593C8.72342 12.7427 7.99016 12.8885 7.24965 12.8885C6.50914 12.8885 5.77589 12.7427 5.09174 12.4593C4.4076 12.1759 3.78598 11.7606 3.26236 11.237C2.73874 10.7133 2.32338 10.0917 2.04 9.40756C1.75662 8.72342 1.61077 7.99016 1.61077 7.24965C1.61077 5.75413 2.20486 4.31985 3.26236 3.26236C4.31985 2.20486 5.75413 1.61077 7.24965 1.61077C8.74518 1.61077 10.1795 2.20486 11.237 3.26236C12.2944 4.31985 12.8885 5.75413 12.8885 7.24965ZM11.7753 12.9143C10.3275 14.0709 8.49192 14.6293 6.64538 14.4747C4.79884 14.3202 3.08155 13.4645 1.84621 12.0834C0.61087 10.7023 -0.0487537 8.90053 0.00281045 7.04825C0.0543746 5.19598 0.813213 3.43374 2.12348 2.12348C3.43374 0.813213 5.19598 0.0543746 7.04825 0.00281045C8.90053 -0.0487537 10.7023 0.61087 12.0834 1.84621C13.4645 3.08155 14.3202 4.79884 14.4747 6.64538C14.6293 8.49192 14.0709 10.3275 12.9143 11.7753L17.4867 16.346C17.5616 16.4209 17.621 16.5098 17.6615 16.6077C17.702 16.7055 17.7229 16.8104 17.7229 16.9163C17.7229 17.0222 17.702 17.1271 17.6615 17.225C17.621 17.3228 17.5616 17.4118 17.4867 17.4867C17.4118 17.5616 17.3228 17.621 17.225 17.6615C17.1271 17.702 17.0222 17.7229 16.9163 17.7229C16.8104 17.7229 16.7055 17.702 16.6077 17.6615C16.5098 17.621 16.4209 17.5616 16.346 17.4867L11.7769 12.9143H11.7753Z" fill="white"/>
                                </svg>
                            </div>
                        </form>
                    <?php endif ?>
                    <a class="btn btn-primary" href="<?php echo esc_url(home_url('/')); ?>">
                        <span>
                            <?php echo esc_html__('Go Back Home', 'festiva'); ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
</div>
<?php get_footer();
