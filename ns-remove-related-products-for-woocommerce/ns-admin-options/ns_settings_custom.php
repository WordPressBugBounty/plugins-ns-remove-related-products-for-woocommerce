<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php $fbp4wp_script_text = get_option('ns_code_js_to_add_fb_pixel', ''); ?>
<div class="genRowNssdc">
	<div style="width: 150px">
		<label for="rrp_enabled_plugin"><?php _e('Enabled Plugin', $ns_text_domain); ?></label>
		<div class="ns-tooltip"> - <span class="ns-tooltiptext"><?php _e('Unselect to disabled plugin', $ns_text_domain); ?></span></div>

		<?php $checked = (get_option('rrp_enabled_plugin') AND get_option('rrp_enabled_plugin') == 'on') ? ' checked="checked"' : ''; ?>
		<input type="checkbox" name="rrp_enabled_plugin" id="rrp_enabled_plugin" <?php echo $checked; ?>>
		<span class="description"></span>
	</div>
</div>
<?php settings_fields('woocommerce_remove_related_free_options'); ?>








