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

class S2sm_Import_Controller {

	public static function index() {
		S2sm_Template::render( 'import/index' );
	}

	public static function import( $params = array() ) {
		global $wp_filter;

		// Set error handler
		@set_error_handler( 'S2sm_Handler::error' );

		// Set params
		if ( empty( $params ) ) {
			$params = s2sm_urldecode( $_REQUEST );
		}

		// Set priority
		$priority = 10;
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
				__( 'Unable to import', S2SM_PLUGIN_NAME )
			);
			exit;
		}

		// Get hook
		if ( isset( $wp_filter['s2sm_import'] ) && ( $filters = $wp_filter['s2sm_import'] ) ) {
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
							S2sm_Log::import( $params );

						} catch ( S2sm_Import_Retry_Exception $e ) {
							status_header( $e->getCode() );
							echo json_encode( array( 'message' => $e->getMessage() ) );
							exit;
						} catch ( Exception $e ) {
							S2sm_Status::error( $e->getMessage(), __( 'Unable to import', S2SM_PLUGIN_NAME ) );
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
						if ( isset( $params['s2sm_manual_import'] ) || isset( $params['s2sm_manual_backups'] ) ) {
							echo json_encode( $params );
							exit;
						}

						return S2sm_Http::get( admin_url( 'admin-ajax.php?action=s2sm_import' ), $params );
					}
				}

				next( $filters );
			}
		}
	}

	public static function buttons() {
		return array(
			apply_filters( 's2sm_import_file', S2sm_Template::get_content( 'import/button-file' ) ),
			apply_filters( 's2sm_import_url', S2sm_Template::get_content( 'import/button-url' ) ),
			apply_filters( 's2sm_import_ftp', S2sm_Template::get_content( 'import/button-ftp' ) ),
			apply_filters( 's2sm_import_dropbox', S2sm_Template::get_content( 'import/button-dropbox' ) ),
			apply_filters( 's2sm_import_gdrive', S2sm_Template::get_content( 'import/button-gdrive' ) ),
			apply_filters( 's2sm_import_s3', S2sm_Template::get_content( 'import/button-s3' ) ),
			apply_filters( 's2sm_import_onedrive', S2sm_Template::get_content( 'import/button-onedrive' ) ),
			apply_filters( 's2sm_import_box', S2sm_Template::get_content( 'import/button-box' ) ),
		);
	}

	public static function max_chunk_size() {
		return min(
			s2sm_parse_size( ini_get( 'post_max_size' ), S2SM_MAX_CHUNK_SIZE ),
			s2sm_parse_size( ini_get( 'upload_max_filesize' ), S2SM_MAX_CHUNK_SIZE ),
			s2sm_parse_size( S2SM_MAX_CHUNK_SIZE )
		);
	}
}
