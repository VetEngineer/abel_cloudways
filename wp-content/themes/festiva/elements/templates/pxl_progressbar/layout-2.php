<?php
if(isset($settings['progressbar']) && !empty($settings['progressbar'])): ?>
    <div class="pxl-progressbar pxl-progressbar-2">
        <?php foreach ($settings['progressbar'] as $key => $progressbar): ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <div class="pxl--meta pxl-flex">
                    <h5 class="pxl--title el-empty pxl-mr-20"><?php echo pxl_print_html($progressbar['title']); ?></h5>
                    <?php if($settings['percentage_show'] == 'yes') : ?>
                    <div class="pxl--percentage"><?php echo pxl_print_html($progressbar['percent']['size']); ?>%</div>
                    <?php endif; ?>
                </div>
                <div class="pxl--holder">
                    <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($progressbar['percent']['size']); ?>"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>