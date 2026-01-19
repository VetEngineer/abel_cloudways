<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Bravis-Themes
 * @since Festiva 1.0
 */

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
 
if(!defined('DEV_MODE')){

    define('DEV_MODE', true);

}
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
/**
 * Theme Require
*/
festiva()->require_folder('inc');
festiva()->require_folder('inc/classes');
festiva()->require_folder('inc/theme-options');
festiva()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    festiva()->require_folder('woocommerce');
}