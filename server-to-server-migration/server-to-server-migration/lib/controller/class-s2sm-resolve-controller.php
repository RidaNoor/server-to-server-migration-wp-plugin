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

class S2sm_Resolve_Controller {

	public static function resolve( $params = array() ) {

		// Set error handler
		@set_error_handler( 'S2sm_Handler::error' );

		// Set params
		if ( empty( $params ) ) {
			$params = s2sm_urldecode( $_REQUEST );
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
				__( 'Unable to resolve', S2SM_PLUGIN_NAME )
			);
			exit;
		}

		// Set IP address
		if ( isset( $params['url_ip'] ) && ( $ip = $params['url_ip'] ) ) {
			update_option( S2SM_URL_IP, $ip );
		}

		// Set adapter
		if ( isset( $params['url_adapter'] ) && ( $adapter = $params['url_adapter'] ) ) {
			if ( $adapter === 'curl' ) {
				update_option( S2SM_URL_ADAPTER, 'curl' );
			} else {
				update_option( S2SM_URL_ADAPTER, 'stream' );
			}
		}
	}
}
