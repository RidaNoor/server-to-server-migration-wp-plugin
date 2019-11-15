<?php
/**
 * Copyright (C) 2014-2017 Migzara
 *
 */

// Include plugin bootstrap file
require_once dirname( __FILE__ ) .
	DIRECTORY_SEPARATOR .
	'server-to-server-migration.php';

/**
 * Trigger Uninstall process only if WP_UNINSTALL_PLUGIN is defined
 */
if ( defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	global $wpdb, $wp_filesystem;

	// Delete any options or other data stored in the database here
	delete_option( S2SM_URL_IP );
	delete_option( S2SM_URL_ADAPTER );
	delete_option( S2SM_SECRET_KEY );
	delete_option( S2SM_AUTH_USER );
	delete_option( S2SM_AUTH_PASSWORD );
	delete_option( S2SM_STATUS );
}
