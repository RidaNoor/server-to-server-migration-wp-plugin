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
		if ( defined( 'S2SMDE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMDE_PLUGIN_NAME ] = array(
				'key'      => S2SMDE_PLUGIN_KEY,
				'about'    => S2SMDE_PLUGIN_ABOUT,
				'basename' => S2SMDE_PLUGIN_BASENAME,
				'version'  => S2SMDE_VERSION,
				'requires' => '3.14',
				'short'    => S2SMDE_PLUGIN_SHORT,
			);
		}

		// Add Google Drive Extension
		if ( defined( 'S2SMGE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMGE_PLUGIN_NAME ] = array(
				'key'      => S2SMGE_PLUGIN_KEY,
				'about'    => S2SMGE_PLUGIN_ABOUT,
				'basename' => S2SMGE_PLUGIN_BASENAME,
				'version'  => S2SMGE_VERSION,
				'requires' => '2.15',
				'short'    => S2SMGE_PLUGIN_SHORT,
			);
		}

		// Add Amazon S3 extension
		if ( defined( 'S2SMSE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMSE_PLUGIN_NAME ] = array(
				'key'      => S2SMSE_PLUGIN_KEY,
				'about'    => S2SMSE_PLUGIN_ABOUT,
				'basename' => S2SMSE_PLUGIN_BASENAME,
				'version'  => S2SMSE_VERSION,
				'requires' => '3.8',
				'short'    => S2SMSE_PLUGIN_SHORT,
			);
		}

		// Add Multisite Extension
		if ( defined( 'S2SMME_PLUGIN_NAME' ) ) {
			$extensions[ S2SMME_PLUGIN_NAME ] = array(
				'key'      => S2SMME_PLUGIN_KEY,
				'about'    => S2SMME_PLUGIN_ABOUT,
				'basename' => S2SMME_PLUGIN_BASENAME,
				'version'  => S2SMME_VERSION,
				'requires' => '3.26',
				'short'    => S2SMME_PLUGIN_SHORT,
			);
		}

		// Add Unlimited Extension
		if ( defined( 'S2SMUE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMUE_PLUGIN_NAME ] = array(
				'key'      => S2SMUE_PLUGIN_KEY,
				'about'    => S2SMUE_PLUGIN_ABOUT,
				'basename' => S2SMUE_PLUGIN_BASENAME,
				'version'  => S2SMUE_VERSION,
				'requires' => '2.6',
				'short'    => S2SMUE_PLUGIN_SHORT,
			);
		}

		// Add FTP Extension
		if ( defined( 'S2SMFE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMFE_PLUGIN_NAME ] = array(
				'key'      => S2SMFE_PLUGIN_KEY,
				'about'    => S2SMFE_PLUGIN_ABOUT,
				'basename' => S2SMFE_PLUGIN_BASENAME,
				'version'  => S2SMFE_VERSION,
				'requires' => '2.11',
				'short'    => S2SMFE_PLUGIN_SHORT,
			);
		}

		// Add URL Extension
		if ( defined( 'S2SMLE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMLE_PLUGIN_NAME ] = array(
				'key'      => S2SMLE_PLUGIN_KEY,
				'about'    => S2SMLE_PLUGIN_ABOUT,
				'basename' => S2SMLE_PLUGIN_BASENAME,
				'version'  => S2SMLE_VERSION,
				'requires' => '2.9',
				'short'    => S2SMLE_PLUGIN_SHORT,
			);
		}

		// Add OneDrive Extension
		if ( defined( 'S2SMOE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMOE_PLUGIN_NAME ] = array(
				'key'      => S2SMOE_PLUGIN_KEY,
				'about'    => S2SMOE_PLUGIN_ABOUT,
				'basename' => S2SMOE_PLUGIN_BASENAME,
				'version'  => S2SMOE_VERSION,
				'requires' => '1.6',
				'short'    => S2SMOE_PLUGIN_SHORT,
			);
		}

		// Add Box Extension
		if ( defined( 'S2SMBE_PLUGIN_NAME' ) ) {
			$extensions[ S2SMBE_PLUGIN_NAME ] = array(
				'key'      => S2SMBE_PLUGIN_KEY,
				'about'    => S2SMBE_PLUGIN_ABOUT,
				'basename' => S2SMBE_PLUGIN_BASENAME,
				'version'  => S2SMBE_VERSION,
				'requires' => '1.0',
				'short'    => S2SMBE_PLUGIN_SHORT,
			);
		}

		return $extensions;
	}
}
