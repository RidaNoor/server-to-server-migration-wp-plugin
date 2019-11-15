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
_Status {

	public static function error( $message, $title = null ) {
		self::log( array( 'type' => 'error', 'message' => $message, 'title' => $title ) );
	}

	public static function info( $message, $title = null ) {
		self::log( array( 'type' => 'info', 'message' => $message, 'title' => $title ) );
	}

	public static function download( $message, $title = null ) {
		self::log( array( 'type' => 'download', 'message' => $message, 'title' => $title ) );
	}

	public static function confirm( $message, $title = null ) {
		self::log( array( 'type' => 'confirm', 'message' => $message, 'title' => $title ) );
	}

	public static function done( $message, $title = null ) {
		self::log( array( 'type' => 'done', 'message' => $message, 'title' => $title ) );
	}

	public static function blogs( $message, $title = null ) {
		self::log( array( 'type' => 'blogs', 'message' => $message, 'title' => $title ) );
	}

	public static function progress( $percent, $title = null ) {
		self::log( array( 'type' => 'progress', 'percent' => $percent, 'title' => $title ) );
	}

	public static function log( $data = array() ) {
		if ( isset( $_REQUEST['s2sm
_manual_export'] ) || isset( $_REQUEST['s2sm
_manual_import'] ) || isset( $_REQUEST['s2sm
_manual_backups'] ) ) {
			update_option( S2SM_STATUS, $data );
		}
	}
}
