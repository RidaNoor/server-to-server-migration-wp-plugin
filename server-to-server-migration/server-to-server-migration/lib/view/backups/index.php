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
-icon-export"></i> <?php _e( 'Backups', S2SM
_PLUGIN_NAME ); ?></h1>

				<?php include S2SM
_TEMPLATES_PATH . '/common/report-problem.php'; ?>

				<form action="" method="post" id="s2sm
-backups-form" class="s2sm
-clear">

					<?php if ( is_readable( S2SM
_BACKUPS_PATH ) && is_writable( S2SM
_BACKUPS_PATH ) ) :  ?>
						<?php if ( $backups ) : ?>
							<table class="s2sm
-backups">
								<thead>
									<tr>
										<th class="s2sm
-column-name"><?php _e( 'Name', S2SM
_PLUGIN_NAME ); ?></th>
										<th class="s2sm
-column-date"><?php _e( 'Date', S2SM
_PLUGIN_NAME ); ?></th>
										<th class="s2sm
-column-size"><?php _e( 'Size', S2SM
_PLUGIN_NAME ); ?></th>
										<th class="s2sm
-column-actions"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ( $backups as $backup ) : ?>
									<tr>
										<td class="s2sm
-column-name">
											<i class="s2sm
-icon-file-zip"></i>
											<?php echo esc_html( $backup['filename'] ); ?>
										</td>
										<?php if ( is_null( $backup['size'] ) ) :  ?>
											<td class="s2sm
-column-info" colspan="3">
												<?php _e( 'The file is too large for your hosting plan.', S2SM
_PLUGIN_NAME ); ?>
											</td>
										<?php else : ?>
											<td class="s2sm
-column-date">
												<?php echo human_time_diff( $backup['mtime'] ); ?> <?php _e( 'ago', S2SM
_PLUGIN_NAME ); ?>
											</td>
											<td class="s2sm
-column-size">
												<?php echo size_format( $backup['size'], 2 ); ?>
											</td>
											<td class="s2sm
-column-actions s2sm
-backup-actions">
											
												<a href="#" onclick="copyToClipboard('<?php echo s2sm
_backups_url( array( 'archive' => esc_attr( $backup['filename'] ) ) ); ?>')" class="s2sm
-button-green s2sm
-button-alone s2sm
-backup-download">
													<i class="s2sm
-icon-plus2 s2sm
-icon-alone"></i>
													<span><?php _e( 'Get URL', S2SM
_PLUGIN_NAME ); ?></span>
												</a>
												<a href="<?php echo s2sm
_backups_url( array( 'archive' => esc_attr( $backup['filename'] ) ) ); ?>" class="s2sm
-button-green s2sm
-button-alone s2sm
-backup-download">
													<i class="s2sm
-icon-arrow-down s2sm
-icon-alone"></i>
													<span><?php _e( 'Download', S2SM
_PLUGIN_NAME ); ?></span>
												</a>
												<a href="#" data-archive="<?php echo esc_attr( $backup['filename'] ); ?>" class="s2sm
-button-gray s2sm
-button-alone s2sm
-backup-restore">
													<i class="s2sm
-icon-cloud-upload s2sm
-icon-alone"></i>
													<span><?php _e( 'Restore', S2SM
_PLUGIN_NAME ); ?></span>
												</a>
												<a href="#" data-archive="<?php echo esc_attr( $backup['filename'] ); ?>" class="s2sm
-button-red s2sm
-button-alone s2sm
-backup-delete">
													<i class="s2sm
-icon-close s2sm
-icon-alone"></i>
													<span><?php _e( 'Delete', S2SM
_PLUGIN_NAME ); ?></span>
												</a>
											</td>
										<?php endif; ?>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						<?php else : ?>
							<div class="s2sm
-backups-empty">
								<p><?php _e( 'There are no backups available at this time, why not create a new one?', S2SM
_PLUGIN_NAME ); ?></p>
								<p>
									<a href="<?php echo network_admin_url( 'admin.php?page=site-migration-export' ); ?>" class="s2sm
-button-green">
										<i class="s2sm
-icon-export"></i>
										<?php _e( 'Create backup', S2SM
_PLUGIN_NAME ); ?>
									</a>
								</p>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<br />
						<br />
						<div class="s2sm
-clear s2sm
-message s2sm
-red-message">
							<?php
							printf(
								__(
									'<h3>Site could not create backups!</h3>' .
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

					<?php do_action( 's2sm
_backups_left_end' ); ?>

					<input type="hidden" name="s2sm
_manual_backups" value="1" />

				</form>
			</div>
		</div>
		<div class="s2sm
-right">
			<div class="s2sm
-sidebar">
				<div class="s2sm
-segment">

					<?php if ( ! S2SM
_DEBUG ) : ?>
						<?php include S2SM
_TEMPLATES_PATH . '/common/share-buttons.php'; ?>
					<?php endif; ?>

					<h2><?php _e( 'Leave Feedback', S2SM
_PLUGIN_NAME ); ?></h2>

					<?php include S2SM
_TEMPLATES_PATH . '/common/leave-feedback.php'; ?>

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