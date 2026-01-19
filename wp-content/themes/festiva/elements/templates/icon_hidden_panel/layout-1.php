<?php 
$template = (int)$widget->get_setting('content_template','0');
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'festiva_hook_anchor_hidden_panel' );
	} 
}
?>
<div class="pxl-hidden-panel-button pxl-anchor-button pxl-cursor--cta">
	<div class="pxl-line">
		<span class="pxl-icon-line pxl-icon-line1"></span>
		<span class="pxl-icon-line pxl-icon-line2"></span>
		<span class="pxl-icon-line pxl-icon-line3"></span>
	</div>
</div>