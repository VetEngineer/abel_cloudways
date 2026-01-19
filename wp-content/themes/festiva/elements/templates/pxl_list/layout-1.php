<?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): 
$is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
<div class="pxl-list pxl-list1 <?php echo pxl_print_html($settings['pxl-type-list'])?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl--title "> <?php echo pxl_print_html($settings['pxl_title'])?></div>
    <?php foreach ($settings['lists'] as $key => $value): 
        $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
        $widget->add_render_attribute( $icon_key, [
            'class' => $value['pxl_icon'],
            'aria-hidden' => 'true',
        ] );
        $link_key = $widget->get_repeater_setting_key( 'lists', 'value', $key );
        if ( ! empty( $value['btn_link']['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

            if ( $value['btn_link']['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $value['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key ); 
        ?>


        <div class="pxl--item">
            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                <?php if ( ! empty( $value['pxl_icon'] ) ) : ?>
                    <div class="pxl-item--icon pxl-mr-10 <?php echo esc_attr($settings['style_icon'])?>">
                        <?php if ( $is_new ):
                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                        elseif(!empty($value['pxl_icon'])): ?>
                            <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?> " aria-hidden="true"></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--text  el-empty">
                    <div class="pxl-item-text">
                       <?php echo pxl_print_html($value['text'])?>
                   </div>
                   <div class="pxl-sub-text">
                    <?php echo pxl_print_html($value['sub_text'])?>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>
</div>
<?php endif; ?>