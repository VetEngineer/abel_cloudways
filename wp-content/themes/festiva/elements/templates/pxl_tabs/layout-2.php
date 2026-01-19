<?php $html_id = pxl_get_element_id($settings); 
$editor_title = $widget->get_settings_for_display( 'heading' );
$editor_title = $widget->parse_text_editor( $editor_title ); 
if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs2 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="wrap-title">
            <div class="pxl-tabs--heading">
                <?php if (!empty($settings['sub_heading'])) : ?>
                    <div class="pxl-sub-heading <?php if($settings['indentation'] === 'yes'){echo "pxl-indentation";} ?>">
                        <?php echo pxl_print_html($settings['sub_heading']); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['heading'])) : ?>
                    <div class="pxl--heading">
                        <?php echo wp_kses_post($editor_title); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="pxl-tabs--title">
                <?php foreach ($settings['tabs'] as $key => $value) :
                    $icon_key = $widget->get_repeater_setting_key( 'pxl_icon_tab', 'icons', $key );
                    ?>
                    <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                        <?php echo pxl_print_html($value['title']); ?>
                        <div class="pxl-sub--title ">
                            <?php echo pxl_print_html($value['sub_title']); ?>
                        </div>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php if ($content['content_type'] && !empty($content['desc'])) : ?>
                        <?php if ( !empty($content['image']['id']) ) : ?>
                            <div class="pxl-content--img">
                                <?php $img  = pxl_get_image_by_size( array(
                                    'attach_id'  => $content['image']['id'],
                                    'thumb_size' => $image_size,
                                ) );
                                $thumbnail    = $img['thumbnail'];
                                echo pxl_print_html($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-number">
                            <?php $number = $key + 1;
                            $formatted_number = ($key < 9) ? '0'.$number : $number;
                            echo esc_attr($formatted_number);?>
                        </div>
                        <div class="pxl-content--desc">
                            <?php echo pxl_print_html($content['desc']); ?>
                        </div>
                        <div class="pxl-content--sub">
                            <?php echo pxl_print_html($content['sub_desc']); ?>
                        </div>
                    <?php elseif (!empty($content['content_template'])) : ?>
                        <?php 
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display((int)$content['content_template']);
                        $tab_bd_ids[] = (int)$content['content_template'];
                        pxl_print_html($tab_content); 
                        ?>
                    <?php endif; ?>       
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
<?php endif; ?>