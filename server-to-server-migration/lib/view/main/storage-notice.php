<div class="error">
	<p>
		<?php
		printf(
			__(
				'All in One WP Migration is not able to create <strong>%s</strong> folder. ' .
				'You will need to create this folder and grant it read/write/execute permissions (0777) ' .
				'for the Server to Server Migration Plugin to function properly.',
				S2SM_PLUGIN_NAME
			),
			S2SM_STORAGE_PATH
		)
		?>
	</p>
</div>
