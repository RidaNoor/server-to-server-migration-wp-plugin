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
_Import_Validate {

	public static function execute( $params ) {

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

		// Set progress
		S2sm
_Status::info( __( 'Unpacking archive...', S2SM_PLUGIN_NAME ) );
		
		// Open the archive file for reading
		$archive = new S2sm
_Extractor( s2sm
_archive_path( $params ) );

		// Set the file pointer to the one that we have saved
		$archive->set_file_pointer( null, $archive_offset );
		$toshow = implode(" ",$params);

		// Validate the archive file consistency
		if ( ! $archive->is_valid() ) {
			throw new S2sm
_Import_Exception(
				__(
					$toshow .
					'<a href="https://help.migzara.com/knowledgebase/corrupted-archive/" target="_blank">https://help.migzara.com/knowledgebase/corrupted-archive/</a>',
					S2SM_PLUGIN_NAME
				)
			);
		}

		// Obtain the name of the archive
		$name = s2sm
_archive_name( $params );

		// Obtain the size of the archive
		$size = s2sm
_archive_bytes( $params );

		// Check file size of the archive
		if ( false === $size ) {
			throw new S2sm
_Not_Accesible_Exception(
				sprintf( __( 'Unable to get the file size of <strong>%s</strong>', S2SM_PLUGIN_NAME ), $name )
			);
		}

		$allowed_size = apply_filters( 's2sm
_max_file_size', S2SM_MAX_FILE_SIZE );

		// Let's check the size of the file to make sure it is less than the maximum allowed
		if ( ( $allowed_size > 0 ) && ( $size > $allowed_size ) ) {
			throw new S2sm
_Import_Exception(
				sprintf(
					__(
						'The file that you are trying to import is over the maximum upload file size limit of <strong>%s</strong>.<br />' .
						'You can remove this restriction by purchasing our ' .
						'<a href="https://migzara.com/products/unlimited-extension" target="_blank">Unlimited Extension</a>.',
						S2SM_PLUGIN_NAME
					),
					size_format( $allowed_size )
				)
			);
		}

		if ( $archive->has_not_reached_eof() ) {

			// Unpack package.json, multisite.json and database.sql files
			if ( ( $current_offset = $archive->extract_by_files_array( s2sm
_storage_path( $params ), array( S2SM_PACKAGE_NAME, S2SM_MULTISITE_NAME, S2SM_DATABASE_NAME ), $content_offset, 10 ) ) ) {

				// Set content offset
				$content_offset = $current_offset;

				// Set archive offset
				$archive_offset = $archive->get_file_pointer();

			} else {

				// Set content offset
				$content_offset = 0;

				// Set archive offset
				$archive_offset = $archive->get_file_pointer();
			}
		}

		// End of the archive?
		if ( $archive->has_reached_eof() ) {

			// Check package.json file
			if ( false === is_file( s2sm
_package_path( $params ) ) ) {
				throw new S2sm
_Import_Exception(
					__( 'Invalid archive file. It should contain <strong>package.json</strong> file.', S2SM_PLUGIN_NAME )
				);
			}

			// Unset content offset
			unset( $params['content_offset'] );

			// Unset archive offset
			unset( $params['archive_offset'] );

			// Unset completed flag
			unset( $params['completed'] );

		} else {

			// Set content offset
			$params['content_offset'] = $content_offset;

			// Set archive offset
			$params['archive_offset'] = $archive_offset;

			// Set completed flag
			$params['completed'] = false;
		}

		// Close the archive file
		$archive->close();

		return $params;
	}
}
