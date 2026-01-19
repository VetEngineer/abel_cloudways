<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
?>
<?php if(isset($settings['image']) && !empty($settings['image']) && count($settings['image'])): ?>
<div class="pxl-grid pxl-image-grid pxl-image-grid1 pxl-image-layout1">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <?php foreach ($settings['image'] as $key => $value):
         $image_i = isset($value['image_i']) ? $value['image_i'] : '';
         ?>
         <div class="<?php echo esc_attr($item_class); ?>">
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
              <?php if(!empty($image_i['id'])) { 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $image_i['id'],
                    'thumb_size' => $image_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="pxl-item-image"> 
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php endforeach; ?>
<div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
</div>
</div>
<?php endif; ?>
