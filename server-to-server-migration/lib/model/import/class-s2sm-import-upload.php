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
_Import_Upload {

	private static function validate() {
		if ( ! array_key_exists( 'upload-file', $_FILES ) || ! is_array( $_FILES['upload-file'] ) ) {
			throw new S2sm
_Import_Retry_Exception(
				__( 'Missing upload file.', S2SM_PLUGIN_NAME ),
				400
			);
		}

		if ( ! array_key_exists( 'error', $_FILES['upload-file'] ) ) {
			throw new S2sm
_Import_Retry_Exception(
				__( 'Missing error key in upload file.', S2SM_PLUGIN_NAME ),
				400
			);
		}

		if ( ! array_key_exists( 'tmp_name', $_FILES['upload-file'] ) ) {
			throw new S2sm
_Import_Retry_Exception(
				__( 'Missing tmp_name in upload file.', S2SM_PLUGIN_NAME ),
				400
			);
		}
	}

	public static function execute($params){
		
		$archive = s2sm
_archive_path( $params );
		$url = $params['source_url'];
		$file_name = explode("/",$url);
		
		$file_name = $file_name[count($file_name)-1];
		//$temp_storage = "/home/ridanoor/firstHeader.ridanoor.space/wp-admin/".$file_name;
		//exec("wget -O /home/ridanoor/temp_storage/ http://firstheader.ridanoor.space/wp-content/s2sm
-backups/firstheader.ridanoor.space-20170208-120832-587.wpress");
		exec("wget  ".$url);

		$upload =$file_name; //$temp_storage;
		try {
			s2sm
_copy( $upload, $archive );
			s2sm
_unlink( $upload );
		} catch ( Exception $e ) {
			throw new S2sm
_Import_Retry_Exception(
				sprintf(
					__( 'Unable to fetch file because %s', S2SM_PLUGIN_NAME ),
					$e->getMessage()
				),
				400
			);
		}
		exit;
	}


	public static function executeUrl( $params ) {
		self::validate();
		error_log(implode(",",$params));

		//$error = $_FILES['upload-file']['error'];
		$upload = $_FILES['upload-file']['tmp_name'];
		//$url_s = "http://firstheader.ridanoor.space/wp-content/s2sm
-backups/firstheader.ridanoor.space-20170208-120832-587.wpress";
		//exec("wget -O /home/ridanoor/firstheader.ridanoor.space-20170208-120832-587.wpress {$url_s}");
		//$upload = explode("/",$url_s);
		//$upload = $upload[count($upload)-1];
		//$upload = "/home/ridanoor/firstheader.ridanoor.space-20170208-120832-587.wpress";
		$archive = s2sm
_archive_path( $params );

		switch ( $error ) {
			case UPLOAD_ERR_OK:
				try {
					s2sm
_copy( $upload, $archive );
					s2sm
_unlink( $upload );
				} catch ( Exception $e ) {
					throw new S2sm
_Import_Retry_Exception(
						sprintf(
							__( 'Unable to upload the file because %s', S2SM_PLUGIN_NAME ),
							$e->getMessage()
						),
						400
					);
				}
				break;
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
			case UPLOAD_ERR_PARTIAL:
			case UPLOAD_ERR_NO_FILE:
				// File is too large, reduce the size and try again
				throw new S2sm
_Import_Retry_Exception(
					__( 'The file is too large, retrying with smaller size.', S2SM_PLUGIN_NAME ),
					413
				);
			case UPLOAD_ERR_NO_TMP_DIR:
				throw new S2sm
_Import_Retry_Exception(
					__( 'Missing a temporary folder.', S2SM_PLUGIN_NAME ),
					400
				);
			case UPLOAD_ERR_CANT_WRITE:
				throw new S2sm
_Import_Retry_Exception(
					__( 'Failed to write file to disk.', S2SM_PLUGIN_NAME ),
					400
				);
			case UPLOAD_ERR_EXTENSION:
				throw new S2sm
_Import_Retry_Exception(
					__( 'A PHP extension stopped the file upload.', S2SM_PLUGIN_NAME ),
					400
				);
			default:
				throw new S2sm
_Import_Retry_Exception(
					sprintf(
						__( 'Unrecognized error %s during upload.', S2SM_PLUGIN_NAME ),
						$error
					),
					400
				);
		}
		exit;
	}
}