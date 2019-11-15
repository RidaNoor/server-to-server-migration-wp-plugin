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
_Backups {

	/**
	 * Get all backup files
	 *
	 * @return array
	 */
	public function get_files() {
		$backups = array();

		// Get backup files
		$iterator = new S2sm
_Extension_Filter(
			new DirectoryIterator( S2SM
_BACKUPS_PATH ),
			array( 'wpress', 'bin' )
		);

		foreach ( $iterator as $item ) {
			try {
				$backups[] = array(
					'filename' => $item->getFilename(),
					'mtime'    => $item->getMTime(),
					'size'     => $item->getSize(),
				);
			} catch ( Exception $e ) {
				$backups[] = array(
					'filename' => $item->getFilename(),
					'mtime'    => null,
					'size'     => s2sm
_filesize( $item->getPathname() ),
				);
			}
		}

		// Sort backups modified date
		usort( $backups, array( $this, 'compare' ) );

		return $backups;
	}

	/**
	 * Delete file
	 *
	 * @param  string  $file File name
	 * @return boolean
	 */
	public function delete_file( $file ) {
		if ( empty( $file ) ) {
			throw new S2sm
_Backups_Exception( __( 'File name is not specified.', S2SM
_PLUGIN_NAME ) );
		} else if ( ! unlink( S2SM
_BACKUPS_PATH . DIRECTORY_SEPARATOR . $file ) ) {
			throw new S2sm
_Backups_Exception(
				sprintf(
					__( 'Unable to delete <strong>"%s"</strong> file.', S2SM
_PLUGIN_NAME ),
					S2SM
_BACKUPS_PATH . DIRECTORY_SEPARATOR . $file
				)
			);
		}

		return true;
	}

	/**
	 * Compare backup files by modified time
	 *
	 * @param  array $a File item A
	 * @param  array $b File item B
	 * @return integer
	 */
	public function compare( $a, $b ) {
		if ( $a['mtime'] === $b['mtime'] ) {
			return 0;
		}

		return ( $a['mtime'] > $b['mtime'] ) ? - 1 : 1;
	}
}
