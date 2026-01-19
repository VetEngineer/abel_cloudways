 <?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): 
 $is_new = \Elementor\Icons_Manager::is_migration_allowed();
 $image_size = !empty($img_size) ? $img_size : '62x62';

 ?>
 <div class="pxl-list-ticket pxl-list-ticket1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php foreach ($settings['lists'] as $key => $value): 
        $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
        $widget->add_render_attribute([
            'aria-hidden' => 'true',
        ] ); 
        ?>

        <div class="pxl--items">
            <div class="pxl--item">
                <div class="pxl--date"> 
                    <span>
                        <?php echo pxl_print_html($value['pxl_date'])?>
                    </span>
                </div>
                <div class="pxl-info-author">
                    <div class="pxl-image-author">
                        <?php if(!empty($value['image']['id'])) : 
                            $img  = pxl_get_image_by_size( array(
                                'attach_id'  => $value['image']['id'],
                                'thumb_size' => $image_size,
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <?php echo wp_kses_post($thumbnail); ?>
                        <?php endif; ?> 
                    </div>       
                    <div class="pxl-item--text el-empty">
                        <div class="pxl-name-author">
                            <?php echo pxl_print_html($value['name'])?>
                        </div>
                        <div class="pxl-position">
                            <?php echo pxl_print_html($value['position'])?>
                        </div>
                    </div>  
                </div>

            </div>

            
            <div class="pxl--button">      
                <?php if($value['condition_active'] == 'true') {pxl_print_html('<div class="btn-condition">'.$value['condition'].'</div>');}?>
                <?php 
                if ( ! empty( $value['link']['url'] ) ) {
                    $widget->add_render_attribute( 'link', 'href', $value['link']['url'] );

                    if ( $value['link']['is_external'] ) {
                        $widget->add_render_attribute( 'link', 'target', '_blank' );
                    }

                    if ( $value['link']['nofollow'] ) {
                        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
                    }
                }
                ?>
                <div class="btn-buy-ticket">
                    <?php echo esc_url($link); ?>
                    <?php if ( ! empty( $value['link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>><?php } ?>
                    <?php echo pxl_print_html($value['text']); ?>
                    <?php if(!empty($value['btn_icon'])) { \Elementor\Icons_Manager::render_icon( $value['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
                </a>
            </div>

        </div>
        <a <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>>
        </a>



    </div>
<?php endforeach; ?>








</div>
<?php endif; ?>
