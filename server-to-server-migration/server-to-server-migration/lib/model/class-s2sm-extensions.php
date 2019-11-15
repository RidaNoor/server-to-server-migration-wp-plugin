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
_Extensions {

	/**
	 * Get active extensions
	 *
	 * @return array
	 */
	public static function get() {
		$extensions = array();

		// Add Dropbox Extension
		if ( defined( 'S2SM
DE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
DE_PLUGIN_NAME ] = array(
				'key'      => S2SM
DE_PLUGIN_KEY,
				'about'    => S2SM
DE_PLUGIN_ABOUT,
				'basename' => S2SM
DE_PLUGIN_BASENAME,
				'version'  => S2SM
DE_VERSION,
				'requires' => '3.14',
				'short'    => S2SM
DE_PLUGIN_SHORT,
			);
		}

		// Add Google Drive Extension
		if ( defined( 'S2SM
GE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
GE_PLUGIN_NAME ] = array(
				'key'      => S2SM
GE_PLUGIN_KEY,
				'about'    => S2SM
GE_PLUGIN_ABOUT,
				'basename' => S2SM
GE_PLUGIN_BASENAME,
				'version'  => S2SM
GE_VERSION,
				'requires' => '2.15',
				'short'    => S2SM
GE_PLUGIN_SHORT,
			);
		}

		// Add Amazon S3 extension
		if ( defined( 'S2SM
SE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
SE_PLUGIN_NAME ] = array(
				'key'      => S2SM
SE_PLUGIN_KEY,
				'about'    => S2SM
SE_PLUGIN_ABOUT,
				'basename' => S2SM
SE_PLUGIN_BASENAME,
				'version'  => S2SM
SE_VERSION,
				'requires' => '3.8',
				'short'    => S2SM
SE_PLUGIN_SHORT,
			);
		}

		// Add Multisite Extension
		if ( defined( 'S2SM
ME_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
ME_PLUGIN_NAME ] = array(
				'key'      => S2SM
ME_PLUGIN_KEY,
				'about'    => S2SM
ME_PLUGIN_ABOUT,
				'basename' => S2SM
ME_PLUGIN_BASENAME,
				'version'  => S2SM
ME_VERSION,
				'requires' => '3.26',
				'short'    => S2SM
ME_PLUGIN_SHORT,
			);
		}

		// Add Unlimited Extension
		if ( defined( 'S2SM
UE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
UE_PLUGIN_NAME ] = array(
				'key'      => S2SM
UE_PLUGIN_KEY,
				'about'    => S2SM
UE_PLUGIN_ABOUT,
				'basename' => S2SM
UE_PLUGIN_BASENAME,
				'version'  => S2SM
UE_VERSION,
				'requires' => '2.6',
				'short'    => S2SM
UE_PLUGIN_SHORT,
			);
		}

		// Add FTP Extension
		if ( defined( 'S2SM
FE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
FE_PLUGIN_NAME ] = array(
				'key'      => S2SM
FE_PLUGIN_KEY,
				'about'    => S2SM
FE_PLUGIN_ABOUT,
				'basename' => S2SM
FE_PLUGIN_BASENAME,
				'version'  => S2SM
FE_VERSION,
				'requires' => '2.11',
				'short'    => S2SM
FE_PLUGIN_SHORT,
			);
		}

		// Add URL Extension
		if ( defined( 'S2SM
LE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
LE_PLUGIN_NAME ] = array(
				'key'      => S2SM
LE_PLUGIN_KEY,
				'about'    => S2SM
LE_PLUGIN_ABOUT,
				'basename' => S2SM
LE_PLUGIN_BASENAME,
				'version'  => S2SM
LE_VERSION,
				'requires' => '2.9',
				'short'    => S2SM
LE_PLUGIN_SHORT,
			);
		}

		// Add OneDrive Extension
		if ( defined( 'S2SM
OE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
OE_PLUGIN_NAME ] = array(
				'key'      => S2SM
OE_PLUGIN_KEY,
				'about'    => S2SM
OE_PLUGIN_ABOUT,
				'basename' => S2SM
OE_PLUGIN_BASENAME,
				'version'  => S2SM
OE_VERSION,
				'requires' => '1.6',
				'short'    => S2SM
OE_PLUGIN_SHORT,
			);
		}

		// Add Box Extension
		if ( defined( 'S2SM
BE_PLUGIN_NAME' ) ) {
			$extensions[ S2SM
BE_PLUGIN_NAME ] = array(
				'key'      => S2SM
BE_PLUGIN_KEY,
				'about'    => S2SM
BE_PLUGIN_ABOUT,
				'basename' => S2SM
BE_PLUGIN_BASENAME,
				'version'  => S2SM
BE_VERSION,
				'requires' => '1.0',
				'short'    => S2SM
BE_PLUGIN_SHORT,
			);
		}

		return $extensions;
	}
}
