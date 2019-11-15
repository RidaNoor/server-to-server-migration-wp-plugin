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
_Updater_Controller {

	public static function plugins_api( $result, $action = null, $args = null ) {
		return S2sm
_Updater::plugins_api( $result, $action, $args );
	}

	public static function pre_update_plugins( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// Check for updates
		S2sm
_Updater::check_for_updates();

		return $transient;
	}

	public static function update_plugins( $transient ) {
		return S2sm
_Updater::update_plugins( $transient );
	}

	public static function check_for_updates() {
		return S2sm
_Updater::check_for_updates();
	}

	public static function plugin_row_meta( $links, $file ) {
		return S2sm
_Updater::plugin_row_meta( $links, $file );
	}

	public static function updater() {
		$extensions = S2sm
_Extensions::get();

		// Set uuid
		$uuid = null;
		if ( isset( $_POST['s2sm
_uuid'] ) ) {
			$uuid = trim( $_POST['s2sm
_uuid'] );
		}

		// Set extension
		$extension = null;
		if ( isset( $_POST['s2sm
_extension'] ) ) {
			$extension = trim( $_POST['s2sm
_extension'] );
		}

		// Verify whether extension exists
		if ( isset( $extensions[ $extension ] ) ) {
			update_option( $extensions[ $extension ]['key'], $uuid );
		}
	}
}
