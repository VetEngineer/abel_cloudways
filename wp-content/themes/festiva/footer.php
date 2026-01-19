<?php
/**
 * @package Bravis-Themes
 */
?>
</div><!-- #main -->
<?php if (!is_404()) : ?>
	<?php festiva()->footer->getFooter(); ?>
<?php endif ?>

<?php do_action( 'pxl_anchor_target') ?>
</div><!-- #wapper -->
<?php wp_footer(); ?>
</body>
</html>
