<?php if(!function_exists('festiva_configs')){
    function festiva_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'festiva'), 
                    'value' => festiva()->get_opt('primary_color', '#ffffff')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'festiva'), 
                    'value' => festiva()->get_opt('secondary_color', '#0a1119')
                ],
                'third'   => [
                    'title' => esc_html__('Third Color', 'festiva'), 
                    'value' => festiva()->get_theme_opt('third_color', '#FF2883')
                ],
                'four'   => [
                    'title' => esc_html__('Four Color', 'festiva'), 
                    'value' => festiva()->get_theme_opt('four_color', '#07847F')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'festiva'), 
                    'value' => festiva()->get_page_opt('body_bg_color', '#fff')
                ]
            ],
            'link' => [
                'color' => festiva()->get_opt('link_color', ['regular' => '#fff'])['regular'],
                'color-hover'   => festiva()->get_opt('link_color', ['hover' => '#fff'])['hover'],
                'color-active'  => festiva()->get_opt('link_color', ['active' => '#5f2dde'])['active'],
            ],
            'gradient' => [
                'color-from' => festiva()->get_opt('gradient_color', ['from' => '#E91A83'])['from'],
                'color-to' => festiva()->get_opt('gradient_color', ['to' => '#4C24C1'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('festiva_inline_styles')) {
    function festiva_inline_styles() {  
        
        $theme_colors      = festiva_configs('theme_colors');
        $link_color        = festiva_configs('link');
        $gradient_color    = festiva_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  festiva_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 