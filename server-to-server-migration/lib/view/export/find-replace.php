<ul id="s2sm
-queries">
	<li class="s2sm
-query s2sm
-expandable">
		<p>
			<span>
				<strong><?php _e( 'Find', S2SM_PLUGIN_NAME ); ?></strong>
				<small class="s2sm
-query-find-text s2sm
-tooltip" title="Search the database for this text"><?php echo esc_attr( __( '<text>', S2SM_PLUGIN_NAME ) ); ?></small>
				<strong><?php _e( 'Replace with', S2SM_PLUGIN_NAME ); ?></strong>
				<small class="s2sm
-query-replace-text s2sm
-tooltip" title="Replace the database with this text"><?php echo esc_attr( __( '<another-text>', S2SM_PLUGIN_NAME ) ); ?></small>
				<strong><?php _e( 'in the database', S2SM_PLUGIN_NAME ); ?></strong>
			</span>
			<span class="s2sm
-query-arrow s2sm
-icon-chevron-right"></span>
		</p>
		<div>
			<input class="s2sm
-query-find-input" type="text" placeholder="<?php _e( 'Find', S2SM_PLUGIN_NAME ); ?>" name="options[replace][old_value][]" />
			<input class="s2sm
-query-replace-input" type="text" placeholder="<?php _e( 'Replace with', S2SM_PLUGIN_NAME ); ?>" name="options[replace][new_value][]" />
		</div>
	</li>
</ul>

<button type="button" class="s2sm
-button-gray" id="s2sm
-add-new-replace-button">
	<i class="s2sm
-icon-plus2"></i><?php _e( 'Add', S2SM_PLUGIN_NAME ); ?>
</button>
