<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="nsbigboxtheme<?php echo $ns_style; ?>">
	<div class="titlensbigbox<?php echo $ns_style; ?>">
		<h4><?php _e('SUBSCRIBE TO OUR NEWSLETTER', $ns_text_domain); ?></h4>
	</div>
	<div class="contentnsbigbox">
		<!-- Begin MailChimp Signup Form -->
		<form action="//nsthemes.us12.list-manage.com/subscribe/post?u=07ab11a197e784f0a8f6214a4&amp;id=d48f6e6eaa" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<label for="mce-EMAIL"><?php _e('STAY TUNED!', $ns_text_domain); ?><br/><span><?php _e('Thanks to use our plugin! Submit your email to keep in touch!', $ns_text_domain); ?></span></label>
			<input type="email" value="" name="EMAIL" class="buttonNsEmail" id="mce-EMAIL" placeholder="email address" required>
			<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_07ab11a197e784f0a8f6214a4_d48f6e6eaa" tabindex="-1" value=""></div>
			<div class="buttonNsbigbox<?php echo $ns_style; ?>" onclick="document.getElementById('mc-embedded-subscribe-form').submit(); return false;">
				<?php _e('SUBSCRIBE!', $ns_text_domain); ?>
			</div>
		</form>
		<!--End mc_embed_signup-->
	</div>
</div>