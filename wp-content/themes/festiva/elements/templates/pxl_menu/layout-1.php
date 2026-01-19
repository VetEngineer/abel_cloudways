<?php
$p_menu = festiva()->get_page_opt('p_menu');
if(!empty($p_menu)) {
    $settings['menu'] = $p_menu;
}
if(!empty($settings['menu'])) { ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr($settings['style_menu']); ?> <?php echo esc_attr($settings['hover_active_style'].' '.$settings['sub_show_effect']); ?> <?php echo esc_attr($settings['hover_active_style_sub']); ?>">
        <?php wp_nav_menu(array(
            'menu_class' => 'pxl-menu-primary clearfix',
            'walker'     => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
            'link_before'     => '<span>',
            'link_after'      => '<i class="caseicon-angle-arrow-down pxl-hide"></i></span>',
            'theme_location' => 'primary',
            'menu'        => wp_get_nav_menu_object($settings['menu'])) 
        ); ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr($settings['hover_active_style'].' '.$settings['sub_show_effect']); ?> <?php echo esc_attr($settings['hover_active_style_sub']); ?>">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'link_before'     => '<span>',
            'link_after'      => '<i class="caseicon-angle-arrow-down pxl-hide"></i></span></span>',
            'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        );
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        ) ); ?>
    </div>
<?php } ?>