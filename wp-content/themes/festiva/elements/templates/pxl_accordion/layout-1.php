<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <?php if (!empty($title)) : ?>
                    <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-item--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">

                    <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                    
                    <div class="pxl-icon-plus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                            <rect x="7.35083" y="0.479736" width="2.16563" height="15.1594" fill="white"/>
                            <rect x="16.0134" y="6.97668" width="2.16563" height="15.1594" transform="rotate(90 16.0134 6.97668)" fill="white"/>
                        </svg>
                    </div>
                    </<?php pxl_print_html($settings['title_tag']); ?>>
                    <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-item--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>><?php echo wp_kses_post(nl2br($desc)); ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>