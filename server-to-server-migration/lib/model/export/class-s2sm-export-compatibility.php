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
_Export_Compatibility {

	public static function execute( $params ) {

		// Set progress
		S2sm
_Status::info( __( 'Checking extensions compatibility...', S2SM_PLUGIN_NAME ) );

		// Get messages
		$messages = S2sm
_Compatibility::get( $params );

		// Set messages
		if ( empty( $messages ) ) {
			return $params;
		}

		// Set progress
		S2sm
_Status::error( implode( $messages ) );

		// Manual export
		if ( empty( $params['s2sm
_manual_export'] ) ) {
			if ( function_exists( 'wp_mail' ) ) {

				// Set recipient
				$recipient = get_option( 'admin_email', '' );

				// Set subject
				$subject = __( 'Unable to backup your site', S2SM_PLUGIN_NAME );

				// Set message
				$message = sprintf( __( 'Server-to-Server Migration was unable to backup %s. %s', S2SM_PLUGIN_NAME ), site_url(), implode( $messages ) );

				// Send email
				wp_mail( $recipient, $subject, $message );
			}
		}

		exit;
	}
}
