<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=597242117012725&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>
	!function (d,s,id) {
		var js,
			fjs = d.getElementsByTagName(s)[0],
			p   = /^http:/.test(d.location) ? 'http' : 'https';

		if (!d.getElementById(id)) {
			js = d.createElement(s);
			js.id = id;
			js.src = p+'://platform.twitter.com/widgets.js';
			fjs.parentNode.insertBefore(js, fjs);
		}
	}(document, 'script', 'twitter-wjs');
</script>

<div class="s2sm
-share-button-container">
	<span>
		<a
			href="https://twitter.com/share"
			class="twitter-share-button"
			data-url="https://migzara.com"
			data-text="Check this epic WordPress Migration plugin"
			data-via="servmask"
			data-related="servmask"
			data-hashtags="servmask"
			>
			<?php _e( 'Tweet', S2SM
_PLUGIN_NAME ); ?>
		</a>
	</span>
	<span>
		<div
			class="fb-like s2sm
-top-negative-four"
			data-href="https://www.facebook.com/servmaskproduct"
			data-layout="button_count"
			data-action="recommend"
			data-show-faces="true"
			data-share="false"
			></div>
	</span>
</div>