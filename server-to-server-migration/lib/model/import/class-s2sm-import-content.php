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
_Import_Content {

	public static function execute( $params ) {

		// Read blogs.json file
		$handle = s2sm
_open( s2sm
_blogs_path( $params ), 'r' );

		// Parse blogs.json file
		$blogs = s2sm
_read( $handle, filesize( s2sm
_blogs_path( $params ) ) );
		$blogs = json_decode( $blogs, true );

		// Close handle
		s2sm
_close( $handle );

		// Set content offset
		if ( isset( $params['content_offset'] ) ) {
			$content_offset = (int) $params['content_offset'];
		} else {
			$content_offset = 0;
		}

		// Set archive offset
		if ( isset( $params['archive_offset'] ) ) {
			$archive_offset = (int) $params['archive_offset'];
		} else {
			$archive_offset = 0;
		}

		// Get total files
		if ( isset( $params['total_files'] ) ) {
			$total_files = (int) $params['total_files'];
		} else {
			$total_files = 1;
		}

		// Get total size
		if ( isset( $params['total_size'] ) ) {
			$total_size = (int) $params['total_size'];
		} else {
			$total_size = 1;
		}

		// Get processed files
		if ( isset( $params['processed'] ) ) {
			$processed = (int) $params['processed'];
		} else {
			$processed = 0;
		}

		// What percent of files have we processed?
		$progress = (int) ( ( $processed / $total_size ) * 100 );

		// Set progress
		if ( empty( $content_offset ) ) {
			S2sm
_Status::info( sprintf( __( 'Restoring %d files...<br />%d%% complete', S2SM_PLUGIN_NAME ), $total_files, $progress ) );
		}

		// Start time
		$start = microtime( true );

		// Open the archive file for reading
		$archive = new S2sm
_Extractor( s2sm
_archive_path( $params ) );

		// Set the file pointer to the one that we have saved
		$archive->set_file_pointer( null, $archive_offset );

		$old_paths = array();
		$new_paths = array();

		// Set extract paths
		foreach ( $blogs as $blog ) {
			if ( s2sm
_main_site( $blog['Old']['BlogID'] ) === false ) {
				if ( defined( 'UPLOADBLOGSDIR' ) ) {
					// Old sites dir style
					$old_paths[] = s2sm
_files_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_files_path( $blog['New']['BlogID'] );

					// New sites dir style
					$old_paths[] = s2sm
_sites_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_files_path( $blog['New']['BlogID'] );
				} else {
					// Old sites dir style
					$old_paths[] = s2sm
_files_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_sites_path( $blog['New']['BlogID'] );

					// New sites dir style
					$old_paths[] = s2sm
_sites_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_sites_path( $blog['New']['BlogID'] );
				}
			}
		}

		// Set base site extract paths (should be added at the end of arrays)
		foreach ( $blogs as $blog ) {
			if ( s2sm
_main_site( $blog['Old']['BlogID'] ) === true ) {
				if ( defined( 'UPLOADBLOGSDIR' ) ) {
					// Old sites dir style
					$old_paths[] = s2sm
_files_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_files_path( $blog['New']['BlogID'] );

					// New sites dir style
					$old_paths[] = s2sm
_sites_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_files_path( $blog['New']['BlogID'] );
				} else {
					// Old sites dir style
					$old_paths[] = s2sm
_files_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_sites_path( $blog['New']['BlogID'] );

					// New sites dir style
					$old_paths[] = s2sm
_sites_path( $blog['Old']['BlogID'] );
					$new_paths[] = s2sm
_sites_path( $blog['New']['BlogID'] );
				}
			}
		}

		while ( $archive->has_not_reached_eof() ) {
			try {

				// Exclude WordPress files
				$exclude_files = array_keys( _get_dropins() );

				// Exclude plugin files
				$exclude_files = array_merge( $exclude_files, array(
					S2SM_PACKAGE_NAME,
					S2SM_MULTISITE_NAME,
					S2SM_DATABASE_NAME,
					S2SM_MUPLUGINS_NAME,
				) );

				// Extract a file from archive to WP_CONTENT_DIR
				if ( ( $current_offset = $archive->extract_one_file_to( WP_CONTENT_DIR, $exclude_files, $old_paths, $new_paths, $content_offset, 10 ) ) ) {

					// What percent of files have we processed?
					if ( ( $processed += ( $current_offset - $content_offset ) ) ) {
						$progress = (int) ( ( $processed / $total_size ) * 100 );
					}

					// Set progress
					S2sm
_Status::info( sprintf( __( 'Restoring %d files...<br />%d%% complete', S2SM_PLUGIN_NAME ), $total_files, $progress ) );

					// Set content offset
					$content_offset = $current_offset;

					// Set archive offset
					$archive_offset = $archive->get_file_pointer();

					break;
				}

				// Increment processed files
				if ( empty( $content_offset ) ) {
					$processed += $archive->get_current_filesize();
				}

				// Set content offset
				$content_offset = 0;

				// Set archive offset
				$archive_offset = $archive->get_file_pointer();

			} catch ( S2sm
_Quota_Exceeded_Exception $e ) {
				throw new Exception( 'Out of disk space.' );
			} catch ( Exception $e ) {
				// Skip bad file permissions
			}

			// More than 10 seconds have passed, break and do another request
			if ( ( microtime( true ) - $start ) > 10 ) {
				break;
			}
		}

		// End of the archive?
		if ( $archive->has_reached_eof() ) {

			// Unset content offset
			unset( $params['content_offset'] );

			// Unset archive offset
			unset( $params['archive_offset'] );

			// Unset processed files
			unset( $params['processed'] );

			// Unset completed flag
			unset( $params['completed'] );

		} else {

			// Set content offset
			$params['content_offset'] = $content_offset;

			// Set archive offset
			$params['archive_offset'] = $archive_offset;

			// Set processed files
			$params['processed'] = $processed;

			// Set completed flag
			$params['completed'] = false;
		}

		// Close the archive file
		$archive->close();

		return $params;
	}
}
