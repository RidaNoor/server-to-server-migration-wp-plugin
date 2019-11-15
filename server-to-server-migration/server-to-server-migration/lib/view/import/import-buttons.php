<?php if ( is_readable( S2SM
_STORAGE_PATH ) && is_writable( S2SM
_STORAGE_PATH ) ) :  ?>
	<div class="s2sm
-import-messages"></div>

	<div class="s2sm
-import-form">
		<div class="hide-if-no-js">
			<div class="s2sm
-drag-drop-area" id="s2sm
-drag-drop-area">
				<div id="s2sm
-import-init">
					<p>
						<i class="s2sm
-icon-cloud-upload"></i><br />
						<?php _e( 'Drag & Drop to upload', S2SM
_PLUGIN_NAME ); ?>
					</p>
					<div class="s2sm
-button-group s2sm
-button-import s2sm
-expandable">
						<div class="s2sm
-button-main">
							<span><?php _e( 'Import From', S2SM
_PLUGIN_NAME ); ?></span>
							<span class="ai1mw-lines">
								<span class="s2sm
-line s2sm
-line-first"></span>
								<span class="s2sm
-line s2sm
-line-second"></span>
								<span class="s2sm
-line s2sm
-line-third"></span>
							</span>
						</div>
						<ul class="s2sm
-dropdown-menu s2sm
-import-providers">
							<?php foreach ( apply_filters( 's2sm
_import_buttons', array() ) as $button ) : ?>
								<li>
									<?php echo $button; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<p>
		<?php _e( 'Maximum upload file size:' ); ?>
		<?php if ( ( $max_file_size = apply_filters( 's2sm
_max_file_size', S2SM
_MAX_FILE_SIZE ) ) ) :  ?>
			<span class="s2sm
-max-upload-size"><?php echo size_format( $max_file_size ); ?></span>
			<span class="s2sm
-unlimited-import">
				<a href="https://migzara.com/products/unlimited-extension" target="_blank" class="s2sm
-label">
					<i class="s2sm
-icon-notification"></i>
					<?php _e( 'Get unlimited', S2SM
_PLUGIN_NAME ); ?>
				</a>
			</span>
		<?php else : ?>
			<span class="s2sm
-max-upload-size"><?php _e( 'Unlimited', S2SM
_PLUGIN_NAME ); ?></span>
		<?php endif; ?>
	</p>
<?php else : ?>
	<div class="s2sm
-message s2sm
-red-message">
		<?php
		printf(
			__(
				'<h3>Site could not be imported!</h3>' .
				'<p>Please make sure that storage directory <strong>%s</strong> has read and write permissions.</p>',
				S2SM
_PLUGIN_NAME
			),
			S2SM
_STORAGE_PATH
		);
		?>
	</div>
<?php endif; ?>
