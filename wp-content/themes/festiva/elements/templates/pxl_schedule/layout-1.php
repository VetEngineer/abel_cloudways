<?php 
if(isset($settings['schedule']) && !empty($settings['schedule']) && count($settings['schedule'])): 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed(); 
?>
<div class="pxl-schedule pxl-schedule1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl--inner">
        <?php foreach ($settings['schedule'] as $key => $value): 
            $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
            $widget->add_render_attribute($icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ]); 
            ?>
            <div class="pxl--item">
                <?php if (!empty($value['pxl_icon'])): ?>
                    <?php if ($is_new): ?>
                        <?php \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']); ?>
                    <?php else: ?>
                        <i class="<?php echo esc_attr($value['pxl_icon']); ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="pxl-item--text el-empty">
                    <div class="pxl-item-text">
                        <?php echo pxl_print_html($value['text']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>