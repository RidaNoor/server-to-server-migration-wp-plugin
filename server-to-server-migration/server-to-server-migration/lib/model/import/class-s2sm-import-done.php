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

class S2sm
_Import_Done {

	public static function execute( $params ) {

		// Set shutdown handler
		@register_shutdown_function( 'S2sm
_Import_Done::shutdown' );

		// Check multisite.json file
		if ( true === is_file( s2sm
_multisite_path( $params ) ) ) {

			// Read multisite.json file
			$handle = s2sm
_open( s2sm
_multisite_path( $params ), 'r' );

			// Parse multisite.json file
			$multisite = s2sm
_read( $handle, filesize( s2sm
_multisite_path( $params ) ) );
			$multisite = json_decode( $multisite, true );

			// Close handle
			s2sm
_close( $handle );

			// Activate sitewide plugins
			if ( isset( $multisite['Plugins'] ) && ( $plugins = $multisite['Plugins'] ) ) {
				s2sm
_activate_plugins( $plugins );
			}
		} else {

			// Check package.json file
			if ( true === is_file( s2sm
_package_path( $params ) ) ) {

				// Read package.json file
				$handle = s2sm
_open( s2sm
_package_path( $params ), 'r' );

				// Parse package.json file
				$package = s2sm
_read( $handle, filesize( s2sm
_package_path( $params ) ) );
				$package = json_decode( $package, true );

				// Close handle
				s2sm
_close( $handle );

				// Activate plugins
				if ( isset( $package['Plugins'] ) && ( $plugins = $package['Plugins'] ) ) {
					s2sm
_activate_plugins( $plugins );
				}
			}
		}

		// Check blogs.json file
		if ( true === is_file( s2sm
_blogs_path( $params ) ) ) {

			// Read blogs.json file
			$handle = s2sm
_open( s2sm
_blogs_path( $params ), 'r' );

			// Parse blogs.json file
			$blogs = s2sm
_read( $handle, filesize( s2sm
_blogs_path( $params ) ) );
			$blogs = json_decode( $blogs, true );

			// Close handle
			s2sm
_close( $handle );

			// Activate plugins
			foreach ( $blogs as $blog ) {
				if ( isset( $blog['New']['Plugins'] ) && ( $plugins = $blog['New']['Plugins'] ) ) {
					s2sm
_activate_plugins( $plugins );
				}
			}
		}

		return $params;
	}

	public static function shutdown() {

		// Set progress
		S2sm
_Status::done(
			sprintf(
				__(
					'You need to perform two more steps:<br />' .
					'<strong>1. You must save your permalinks structure twice. <a class="s2sm
-no-underline" href="%s" target="_blank">Permalinks Settings</a></strong> <small>(opens a new window)</small><br />' .
					'<strong>2. <a class="s2sm
-no-underline" href="https://wordpress.org/support/view/plugin-reviews/all-in-one-wp-migration?rate=5#postform" target="_blank">Optionally, review the plugin</a>.</strong> <small>(opens a new window)</small>',
					S2SM
_PLUGIN_NAME
				),
				admin_url( 'options-permalink.php#submit' )
			),
			__(
				'Your data has been imported successfuly!',
				S2SM
_PLUGIN_NAME
			)
		);
	}
}
