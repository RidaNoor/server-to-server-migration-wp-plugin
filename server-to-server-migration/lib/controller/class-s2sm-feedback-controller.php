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
_Feedback_Controller {

	public static function feedback() {

		// Set Type
		$type = null;
		if ( isset( $_POST['s2sm
_type'] ) ) {
			$type = trim( $_POST['s2sm
_type'] );
		}

		// Set E-mail
		$email = null;
		if ( isset( $_POST['s2sm
_email'] ) ) {
			$email = trim( $_POST['s2sm
_email'] );
		}

		// Set Message
		$message = null;
		if ( isset( $_POST['s2sm
_message'] ) ) {
			$message = trim( $_POST['s2sm
_message'] );
		}

		// Set Terms
		$terms = false;
		if ( isset( $_POST['s2sm
_terms'] ) ) {
			$terms = (bool) $_POST['s2sm
_terms'];
		}

		$model = new S2sm
_Feedback;

		// Send Feedback
		$response = $model->add( $type, $email, $message, $terms );

		echo json_encode( $response );
		exit;
	}
}
