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
_Import_Blogs {

	public static function execute( $params ) {

		// Set progress
		S2sm
_Status::info( __( 'Preparing blogs...', S2SM_PLUGIN_NAME ) );

		$blogs = array();

		// Check multisite.json file
		if ( true === is_file( s2sm
_multisite_path( $params ) ) ) {

			// Read multisite.json file
			$handle = s2sm
_open( s2sm
_multisite_path( $params ), 'r' );

			// Parse multisite.json file
			$multisite = s2sm
_read( $handle, filesize( s2sm
_multisite_path( $params ) ) );
			$multisite = json_decode( $multisite, true );

			// Close handle
			s2sm
_close( $handle );

			// Validate
			if ( empty( $multisite['Network'] ) ) {
				if ( isset( $multisite['Sites'] ) && ( $sites = $multisite['Sites'] ) ) {
					if ( count( $sites ) === 1 && ( $subsite = current( $sites ) ) ) {

						// Set active plugins (backward compatibility)
						if ( empty( $subsite['Plugins'] ) ) {
							$subsite['Plugins'] = array();
						}

						// Set blog items
						$blogs[] = array(
							'Old' => array(
								'BlogID'  => $subsite['BlogID'],
								'SiteURL' => $subsite['SiteURL'],
								'HomeURL' => $subsite['HomeURL'],
								'Plugins' => $subsite['Plugins'],
							),
							'New' => array(
								'BlogID'  => null,
								'SiteURL' => site_url(),
								'HomeURL' => home_url(),
								'Plugins' => $subsite['Plugins'],
							),
						);
					} else {
						throw new S2sm
_Import_Exception(
							__( 'The archive should contain <strong>Single WordPress</strong> site! Please revisit your export settings.', S2SM_PLUGIN_NAME )
						);
					}
				} else {
					throw new S2sm
_Import_Exception(
						__( 'At least <strong>one WordPress</strong> site should be presented in the archive.', S2SM_PLUGIN_NAME )
					);
				}
			} else {
				throw new S2sm
_Import_Exception(
					__( 'Unable to import <strong>WordPress Network</strong> into WordPress <strong>Single</strong> site.', S2SM_PLUGIN_NAME )
				);
			}
		}

		// Write blogs.json file
		$handle = s2sm
_open( s2sm
_blogs_path( $params ), 'w' );
		s2sm
_write( $handle, json_encode( $blogs ) );
		s2sm
_close( $handle );

		// Set progress
		S2sm
_Status::info( __( 'Done preparing blogs...', S2SM_PLUGIN_NAME ) );

		return $params;
	}
}
