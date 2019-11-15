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
_Report {

	/**
	 * Submit customer report to migzara.com
	 *
	 * @param  string  $email   User E-mail
	 * @param  string  $message User Message
	 * @param  integer $terms   User Accept Terms
	 *
	 * @return array
	 */
	public function add( $email, $message, $terms ) {
		$errors = array();

		// Submit report to ServMask
		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$errors[] = __( 'Your email is not valid.', S2SM
_PLUGIN_NAME );
		} else if ( empty( $message ) ) {
			$errors[] = __( 'Please enter comments in the text area.', S2SM
_PLUGIN_NAME );
		} else if ( empty( $terms ) ) {
			$errors[] = __( 'Please accept report term conditions.', S2SM
_PLUGIN_NAME );
		} else {
			$response = wp_remote_post(
				S2SM
_REPORT_URL,
				array(
					'body' => array(
						'email'   => $email,
						'message' => $message,
					),
				)
			);

			if ( is_wp_error( $response ) ) {
				$errors[] = sprintf( __( 'Something went wrong: %s', S2SM
_PLUGIN_NAME ), $response->get_error_message() );
			}
		}

		return array( 'errors' => $errors );
	}
}
