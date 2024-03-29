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
_Export_Enumerate {

	public static function execute( $params ) {

		// Set progress
		S2sm
_Status::info( __( 'Retrieving a list of all WordPress files...', S2SM
_PLUGIN_NAME ) );

		// Set exclude filters
		$exclude_filters = s2sm
_content_filters();

		// Exclude cache
		if ( isset( $params['options']['no_cache'] ) ) {
			$exclude_filters[] = 'cache';
		}

		// Exclude themes
		if ( isset( $params['options']['no_themes'] ) ) {
			$exclude_filters[] = 'themes';
		} else {
			$inactive_themes = array();

			// Exclude inactive themes
			if ( isset( $params['options']['no_inactive_themes'] ) ) {
				foreach ( wp_get_themes() as $theme => $info ) {
					// Exclude current parent and child themes
					if ( ! in_array( $theme, array( get_template(), get_stylesheet() ) ) ) {
						$inactive_themes[] = 'themes' . DIRECTORY_SEPARATOR . $theme;
					}
				}
			}

			// Set exclude filters
			$exclude_filters = array_merge( $exclude_filters, $inactive_themes );
		}

		// Exclude must-use plugins
		if ( isset( $params['options']['no_muplugins'] ) ) {
			$exclude_filters = array_merge( $exclude_filters, array( 'mu-plugins' ) );
		}

		// Exclude plugins
		if ( isset( $params['options']['no_plugins'] ) ) {
			$exclude_filters = array_merge( $exclude_filters, array( 'plugins' ) );
		} else {
			$inactive_plugins = array();

			// Exclude inactive plugins
			if ( isset( $params['options']['no_inactive_plugins'] ) ) {
				foreach ( get_plugins() as $plugin => $info ) {
					if ( is_plugin_inactive( $plugin ) ) {
						$inactive_plugins[] = 'plugins' . DIRECTORY_SEPARATOR .
							( ( dirname( $plugin ) === '.' ) ? basename( $plugin ) : dirname( $plugin ) );
					}
				}
			}

			// Set exclude filters
			$exclude_filters = array_merge( $exclude_filters, s2sm
_plugin_filters( $inactive_plugins ) );
		}

		// Exclude media
		if ( isset( $params['options']['no_media'] ) ) {
			$exclude_filters = array_merge( $exclude_filters, array( 'uploads', 'blogs.dir' ) );
		}

		// Get total files
		if ( isset( $params['total_files'] ) ) {
			$total_files = (int) $params['total_files'];
		} else {
			$total_files = 0;
		}

		// Get total size
		if ( isset( $params['total_size'] ) ) {
			$total_size = (int) $params['total_size'];
		} else {
			$total_size = 0;
		}

		// Create map file
		$filemap = s2sm
_open( s2sm
_filemap_path( $params ) , 'a+' );

		try {

			// Iterate over content directory
			$iterator = new S2sm
_Recursive_Directory_Iterator( WP_CONTENT_DIR );

			// Exclude uploads, plugins or themes
			$iterator = new S2sm
_Recursive_Exclude_Filter( $iterator, apply_filters( 's2sm
_exclude_content_from_export', $exclude_filters ) );

			// Recursively iterate over content directory
			$iterator = new RecursiveIteratorIterator( $iterator, RecursiveIteratorIterator::LEAVES_ONLY, RecursiveIteratorIterator::CATCH_GET_CHILD );

			// Write path line
			foreach ( $iterator as $item ) {
				if ( $item->isFile() ) {
					if ( s2sm
_write( $filemap, $iterator->getSubPathName() . PHP_EOL ) ) {
						$total_files++;

						// Add current file size
						$total_size += filesize( $iterator->getPathname() );
					}
				}
			}
		} catch ( S2sm
_Quota_Exceeded_Exception $e ) {
			throw new Exception( 'Out of disk space.' );
		} catch ( Exception $e ) {
			// Skip bad file permissions
		}

		// Set progress
		S2sm
_Status::info( __( 'Done retrieving a list of all WordPress files.', S2SM
_PLUGIN_NAME ) );

		// Set total files
		$params['total_files'] = $total_files;

		// Set total size
		$params['total_size'] = $total_size;

		// Close the filemap file
		s2sm
_close( $filemap );

		return $params;
	}
}
