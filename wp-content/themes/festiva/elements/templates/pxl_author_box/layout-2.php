<div class="pxl-author-box pxl-author-box2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php 
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '730x878';
        $signature_size = !empty($settings['sig_size']) ? $settings['sig_size'] : 'full';
         ?>
        <?php if ( !empty($settings['au_signature']['id']) ) : ?>
            <div class="pxl-item--signature">

                <?php $img_signature  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['au_signature']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_signature    = $img_signature['thumbnail'];
                echo pxl_print_html($thumbnail_signature); ?>
            </div>
        <?php endif; ?>
        <h5 class="pxl-item--genre"><?php echo pxl_print_html($settings['au_genre']); ?></h5>
        
    </div>
</div>