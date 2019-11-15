<?php
/**
 * Copyright (C) 2014-2017 Migzara
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */
?>

<div class="s2sm
-container">
	<div class="s2sm
-row">
		<div class="s2sm
-left">
			<div class="s2sm
-holder">
				<h1><i class="s2sm
-icon-export"></i> <?php _e( 'Export Site', S2SM_PLUGIN_NAME ); ?></h1>

				<?php include S2SM_TEMPLATES_PATH . '/common/report-problem.php'; ?>

				<form action="" method="post" id="s2sm
-export-form" class="s2sm
-clear">

					<?php include S2SM_TEMPLATES_PATH . '/export/find-replace.php'; ?>

					<?php do_action( 's2sm
_export_left_options' ); ?>

					<?php include S2SM_TEMPLATES_PATH . '/export/advanced-settings.php'; ?>

					<?php include S2SM_TEMPLATES_PATH . '/export/export-buttons.php'; ?>

					<?php do_action( 's2sm
_export_left_end' ); ?>

					<input type="hidden" name="s2sm
_manual_export" value="1" />

				</form>
			</div>
		</div>
		<div class="s2sm
-right">
			<div class="s2sm
-sidebar">
				<div class="s2sm
-segment">

					<?php if ( ! S2SM_DEBUG ) : ?>
						<?php include S2SM_TEMPLATES_PATH . '/common/share-buttons.php'; ?>
					<?php endif; ?>

					<h2><?php _e( 'Leave Feedback', S2SM_PLUGIN_NAME ); ?></h2>

					<?php include S2SM_TEMPLATES_PATH . '/common/leave-feedback.php'; ?>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function copyToClipboard(text) {
		window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	}
</script>