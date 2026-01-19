<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'img_size' => '',
    'img_size_popup' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$pxl_col_xl_tmp = $col_xl;
$pxl_col_lg_tmp = $col_lg;

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

if($pxl_col_xl_tmp == '5') {
    $col_xl = '25';
}

if($pxl_col_lg_tmp == '5') {
    $col_lg = '25';
}

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($img_size) ? $img_size : '600x600';
$image_size_popup = !empty($img_size_popup) ? $img_size_popup : '800x800';

?>
<?php if(isset($settings['image']) && !empty($settings['image']) && count($settings['image'])): ?>
    <div class="pxl-grid pxl-gallery-grid1 pxl-grid-<?php echo esc_attr($settings['spacing']); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['image'] as $value): 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $value['id'],
                    'thumb_size' => $image_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail']; 

                $img_popup = pxl_get_image_by_size( array(
                    'attach_id'  => $value['id'],
                    'thumb_size' => $image_size_popup,
                    'class' => 'no-lazyload',
                ));
                $thumbnail_popup = $img['url']; 
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="item--inner">
                        <a href="<?php echo esc_url($thumbnail_popup); ?>"></a>
                        <?php echo wp_kses_post($thumbnail); ?>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
