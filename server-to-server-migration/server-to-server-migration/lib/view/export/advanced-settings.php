<div class="s2sm
-field-set">
	<div class="s2sm
-accordion s2sm
-expandable">
		<h4>
			<i class="s2sm
-icon-arrow-right"></i>
			<?php _e( 'Advanced options', S2SM
_PLUGIN_NAME ); ?>
			<small><?php _e( '(click to expand)', S2SM
_PLUGIN_NAME ); ?></small>
		</h4>
		<ul>
			<li>
				<input type="checkbox" id="s2sm
-no-spam-comments" name="options[no_spam_comments]" />
				<label for="s2sm
-no-spam-comments"><?php _e( 'Do <strong>not</strong> export spam comments', S2SM
_PLUGIN_NAME ); ?></label>
			</li>
			<li>
				<input type="checkbox" id="s2sm
-no-revisions" name="options[no_revisions]" />
				<label for="s2sm
-no-revisions"><?php _e( 'Do <strong>not</strong> export post revisions', S2SM
_PLUGIN_NAME ); ?></label>
			</li>
			<li>
				<input type="checkbox" id="s2sm
-no-media" name="options[no_media]" />
				<label for="s2sm
-no-media"><?php _e( 'Do <strong>not</strong> export media library (files)', S2SM
_PLUGIN_NAME ); ?></label>
			</li>
			<li>
				<input type="checkbox" id="s2sm
-no-themes" name="options[no_themes]" />
				<label for="s2sm
-no-themes"><?php _e( 'Do <strong>not</strong> export themes (files)', S2SM
_PLUGIN_NAME ); ?></label>
			</li>

			<?php if ( apply_filters( 's2sm
_max_file_size', S2SM
_MAX_FILE_SIZE ) === 0 ) :  ?>
				<li>
					<input type="checkbox" id="s2sm
-no-inactive-themes" name="options[no_inactive_themes]" />
					<label for="s2sm
-no-inactive-themes"><?php _e( 'Do <strong>not</strong> export inactive themes (files)', S2SM
_PLUGIN_NAME ); ?></label>
					<small style="color:red"><?php _e( 'new', S2SM
_PLUGIN_NAME ); ?></small>
				</li>
			<?php endif; ?>

			<li>
				<input type="checkbox" id="s2sm
-no-muplugins" name="options[no_muplugins]" />
				<label for="s2sm
-no-muplugins"><?php _e( 'Do <strong>not</strong> export must-use plugins (files)', S2SM
_PLUGIN_NAME ); ?></label>
				<small style="color:red"><?php _e( 'new', S2SM
_PLUGIN_NAME ); ?></small>
			</li>

			<li>
				<input type="checkbox" id="s2sm
-no-plugins" name="options[no_plugins]" />
				<label for="s2sm
-no-plugins"><?php _e( 'Do <strong>not</strong> export plugins (files)', S2SM
_PLUGIN_NAME ); ?></label>
			</li>

			<?php if ( apply_filters( 's2sm
_max_file_size', S2SM
_MAX_FILE_SIZE ) === 0 ) :  ?>
				<li>
					<input type="checkbox" id="s2sm
-no-inactive-plugins" name="options[no_inactive_plugins]" />
					<label for="s2sm
-no-inactive-plugins"><?php _e( 'Do <strong>not</strong> export inactive plugins (files)', S2SM
_PLUGIN_NAME ); ?></label>
					<small style="color:red"><?php _e( 'new', S2SM
_PLUGIN_NAME ); ?></small>
				</li>
				<li>
					<input type="checkbox" id="s2sm
-no-cache" name="options[no_cache]" />
					<label for="s2sm
-no-cache"><?php _e( 'Do <strong>not</strong> export cache (files)', S2SM
_PLUGIN_NAME ); ?></label>
					<small style="color:red"><?php _e( 'new', S2SM
_PLUGIN_NAME ); ?></small>
				</li>
			<?php endif; ?>

			<li>
				<input type="checkbox" id="s2sm
-no-database" name="options[no_database]" />
				<label for="s2sm
-no-database"><?php _e( 'Do <strong>not</strong> export database (sql)', S2SM
_PLUGIN_NAME ); ?></label>
			</li>
			<li>
				<input type="checkbox" id="s2sm
-no-email-replace" name="options[no_email_replace]" />
				<label for="s2sm
-no-email-replace"><?php _e( 'Do <strong>not</strong> replace email domain (sql)', S2SM
_PLUGIN_NAME ); ?></label>
				<small style="color:red"><?php _e( 'new', S2SM
_PLUGIN_NAME ); ?></small>
			</li>

			<?php do_action( 's2sm
_export_advanced_settings' ); ?>
		</ul>
	</div>
</div>
