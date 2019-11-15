<div id="s2sm
-modal-dialog-<?php echo $modal; ?>" class="s2sm
-modal-dialog">
	<div class="s2sm
-modal-container">
		<h2><?php _e( 'Enter your Purchase ID', S2SM
_PLUGIN_NAME ); ?></h2>
		<p><?php _e( 'To update your plugin/extension to the latest version, please fill your Purchase ID below.', S2SM
_PLUGIN_NAME ); ?></p>
		<p class="s2sm
-modal-error"></p>
		<p>
			<input type="text" class="s2sm
-purchase-id" placeholder="<?php _e( 'Purchase ID', S2SM
_PLUGIN_NAME ); ?>" />
			<input type="hidden" class="s2sm
-update-link" value="<?php echo $url; ?>" />
		</p>
		<p>
			<?php _e( "Don't have a Purchase ID? You can find your Purchase ID", S2SM
_PLUGIN_NAME ); ?>
			<a href="https://migzara.com/lost-purchase" target="_blank" class="s2sm
-help-link"><?php _e( 'here', S2SM
_PLUGIN_NAME ); ?></a>
		</p>
		<p class="s2sm
-modal-buttons submitbox">
			<button type="button" class="s2sm
-purchase-add s2sm
-button-green">
				<?php _e( 'Save', S2SM
_PLUGIN_NAME ); ?>
			</button>
			<a href="#" class="submitdelete s2sm
-purchase-discard"><?php _e( 'Discard', S2SM
_PLUGIN_NAME ); ?></a>
		</p>
	</div>
</div>

<span id="s2sm
-update-section-<?php echo $modal; ?>">
	<span class="s2sm
-icon-update"></span>
	<?php _e( 'There is an update available. To update, you must enter your', S2SM
_PLUGIN_NAME ); ?>
	<a href="#s2sm
-modal-dialog-<?php echo $modal; ?>"><?php _e( 'Purchase ID', S2SM
_PLUGIN_NAME ); ?></a>.
</span>
