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

class S2sm_Export_Controller {

	public static function index() {
		S2sm_Template::render( 'export/index' );
	}

	public static function export( $params = array() ) {
		global $wp_filter;

		// Set error handler
		@set_error_handler( 'S2sm_Handler::error' );

		// Set params
		if ( empty( $params ) ) {
			$params = s2sm_urldecode( $_REQUEST );
		}

		// Set priority
		$priority = 5;
		if ( isset( $params['priority'] ) ) {
			$priority = (int) $params['priority'];
		}

		// Set secret key
		$secret_key = null;
		if ( isset( $params['secret_key'] ) ) {
			$secret_key = $params['secret_key'];
		}

		// Verify secret key by using the value in the database, not in cache
		if ( $secret_key !== get_option( S2SM_SECRET_KEY ) ) {
			S2sm_Status::error(
				sprintf( __( 'Unable to authenticate your request with secret_key = "%s"', S2SM_PLUGIN_NAME ), $secret_key ),
				__( 'Unable to export', S2SM_PLUGIN_NAME )
			);
			exit;
		}

		// Get hook
		if ( isset( $wp_filter['s2sm_export'] ) && ( $filters = $wp_filter['s2sm_export'] ) ) {
			// WordPress 4.7 introduces new class for working with filters/actions called WP_Hook
			// which adds another level of abstraction and we need to address it.
			if ( is_object( $filters ) ) {
				$filters = current( $filters );
			}

			ksort( $filters );

			// Loop over filters
			while ( $hooks = current( $filters ) ) {
				if ( $priority === key( $filters ) ) {
					foreach ( $hooks as $hook ) {
						try {

							// Run function hook
							$params = call_user_func_array( $hook['function'], array( $params ) );

							// Log request
							S2sm_Log::export( $params );

						} catch ( Exception $e ) {
							S2sm_Status::error( $e->getMessage(), __( 'Unable to export', S2SM_PLUGIN_NAME ) );
							exit;
						}
					}

					// Set completed
					$completed = true;
					if ( isset( $params['completed'] ) ) {
						$completed = (bool) $params['completed'];
					}

					// Do request
					if ( $completed === false || ( $next = next( $filters ) ) && ( $params['priority'] = key( $filters ) ) ) {
						if ( isset( $params['s2sm_manual_export'] ) ) {
							echo json_encode( $params );
							exit;
						}

						return S2sm_Http::get( admin_url( 'admin-ajax.php?action=s2sm_export' ), $params );
					}
				}

				next( $filters );
			}
		}
	}

	public static function buttons() {
		return array(
			apply_filters( 's2sm_export_file', S2sm_Template::get_content( 'export/button-file' ) ),
			apply_filters( 's2sm_export_ftp', S2sm_Template::get_content( 'export/button-ftp' ) ),
			apply_filters( 's2sm_export_dropbox', S2sm_Template::get_content( 'export/button-dropbox' ) ),
			apply_filters( 's2sm_export_gdrive', S2sm_Template::get_content( 'export/button-gdrive' ) ),
			apply_filters( 's2sm_export_s3', S2sm_Template::get_content( 'export/button-s3' ) ),
			apply_filters( 's2sm_export_onedrive', S2sm_Template::get_content( 'export/button-onedrive' ) ),
			apply_filters( 's2sm_export_box', S2sm_Template::get_content( 'export/button-box' ) ),
		);
	}
}
