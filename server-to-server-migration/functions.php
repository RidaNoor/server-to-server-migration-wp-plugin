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

/**
 * Get storage absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
 ini_set("allow_url_fopen", 1);
 
function s2sm_storage_path( $params ) {
	if ( empty( $params['storage'] ) ) {
		throw new S2sm_Storage_Exception( 'Unable to locate storage path' );
	}

	// Get storage path
	$storage = S2SM_STORAGE_PATH . DIRECTORY_SEPARATOR . basename( $params['storage'] );
	if ( ! is_dir( $storage ) ) {
		mkdir( $storage );
	}

	return $storage;
}

/**
 * Get backups absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_backups_path( $params ) {
	if ( empty( $params['archive'] ) ) {
		throw new S2sm_Archive_Exception( 'Unable to locate archive path' );
	}

	return S2SM_BACKUPS_PATH;
}

/**
 * Get archive absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_archive_path( $params ) {
	if ( empty( $params['archive'] ) ) {
		throw new S2sm_Storage_Exception( 'Unable to locate archive path' );
	}

	// Get archive path
	if ( empty( $params['s2sm_manual_backups'] ) ) {
		return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . basename( $params['archive'] );
	}

	return s2sm_backups_path( $params ) . DIRECTORY_SEPARATOR . basename( $params['archive'] );
}

/**
 * Get download absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_download_path( $params ) {
	return s2sm_backups_path( $params ) . DIRECTORY_SEPARATOR . basename( $params['archive'] );
}

/**
 * Get export log absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_export_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_EXPORT_NAME;
}

/**
 * Get import log absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_import_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_IMPORT_NAME;
}

/**
 * Get filemap.list absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_filemap_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_FILEMAP_NAME;
}

/**
 * Get package.json absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_package_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_PACKAGE_NAME;
}

/**
 * Get multisite.json absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_multisite_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_MULTISITE_NAME;
}

/**
 * Get blogs.json absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_blogs_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_BLOGS_NAME;
}

/**
 * Get database.sql absolute path
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_database_path( $params ) {
	return s2sm_storage_path( $params ) . DIRECTORY_SEPARATOR . S2SM_DATABASE_NAME;
}

/**
 * Get error log absolute path
 *
 * @return string
 */
function s2sm_error_path() {
	return S2SM_STORAGE_PATH . DIRECTORY_SEPARATOR . S2SM_ERROR_NAME;
}

/**
 * Get WordPress content directory
 *
 * @param  string $path Relative path
 * @return string
 */
function s2sm_content_path( $path = null ) {
	if ( empty( $path ) ) {
		return WP_CONTENT_DIR;
	}

	return WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $path;
}

/**
 * Get archive name
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_archive_name( $params ) {
	return basename( $params['archive'] );
}

/**
 * Get backups URL address
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_backups_url( $params ) {
	return S2SM_BACKUPS_URL . '/' . s2sm_archive_name( $params );
}

/**
 * Get archive size in bytes
 *
 * @param  array   $params Request parameters
 * @return integer
 */
function s2sm_archive_bytes( $params ) {
	return filesize( s2sm_archive_path( $params ) );
}

/**
 * Get download size in bytes
 *
 * @param  array   $params Request parameters
 * @return integer
 */
function s2sm_download_bytes( $params ) {
	return filesize( s2sm_download_path( $params ) );
}

/**
 * Get archive size as text
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_archive_size( $params ) {
	return size_format( filesize( s2sm_archive_path( $params ) ) );
}

/**
 * Get download size as text
 *
 * @param  array  $params Request parameters
 * @return string
 */
function s2sm_download_size( $params ) {
	return size_format( filesize( s2sm_download_path( $params ) ) );
}

/**
 * Parse file size
 *
 * @param  string $size    File size
 * @param  string $default Default size
 * @return string
 */
function s2sm_parse_size( $size, $default = null ) {
	$suffixes = array(
		''  => 1,
		'k' => 1000,
		'm' => 1000000,
		'g' => 1000000000,
	);

	// Parse size format
	if ( preg_match( '/([0-9]+)\s*(k|m|g)?(b?(ytes?)?)/i', $size, $match ) ) {
		return $match[1] * $suffixes[ strtolower( $match[2] ) ];
	}

	return $default;
}

/**
 * Get current site name
 *
 * @return string
 */
function s2sm_site_name() {
	return parse_url( site_url(), PHP_URL_HOST );
}

/**
 * Get archive file name
 *
 * @return string
 */
function s2sm_archive_file() {
	$name = array();

	// Add domain
	$name[] = parse_url( site_url(), PHP_URL_HOST );

	// Add path
	if ( ( $path = explode( '/', parse_url( site_url(), PHP_URL_PATH ) ) ) ) {
		foreach ( $path as $directory ) {
			if ( $directory ) {
				$name[] = $directory;
			}
		}
	}

	// Add year, month and day
	$name[] = date( 'Ymd' );

	// Add hours, minutes and seconds
	$name[] = date( 'His' );

	// Add unique identifier
	$name[] = rand( 100, 999 );

	return sprintf( '%s.wpress', strtolower( implode( '-', $name ) ) );
}

/**
 * Get archive folder name
 *
 * @return string
 */
function s2sm_archive_folder() {
	$name = array();

	// Add domain
	$name[] = parse_url( site_url(), PHP_URL_HOST );

	// Add path
	if ( ( $path = explode( '/', parse_url( site_url(), PHP_URL_PATH ) ) ) ) {
		foreach ( $path as $directory ) {
			if ( $directory ) {
				$name[] = $directory;
			}
		}
	}

	return strtolower( implode( '-', $name ) );
}

/**
 * Get storage folder name
 *
 * @return string
 */
function s2sm_storage_folder() {
	return uniqid();
}

/**
 * Check whether blog ID is main site
 *
 * @param  integer $blog_id Blog ID
 * @return boolean
 */
function s2sm_main_site( $blog_id = null ) {
	return $blog_id === null || $blog_id === 0 || $blog_id === 1;
}

/**
 * Get sites absolute path by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_sites_path( $blog_id = null ) {
	if ( s2sm_main_site( $blog_id ) ) {
		return S2SM_UPLOADS_PATH;
	}

	return S2SM_SITES_PATH . DIRECTORY_SEPARATOR . $blog_id;
}

/**
 * Get files absolute path by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_files_path( $blog_id = null ) {
	if ( s2sm_main_site( $blog_id ) ) {
		return S2SM_UPLOADS_PATH;
	}

	return S2SM_BLOGSDIR_PATH . DIRECTORY_SEPARATOR . $blog_id . DIRECTORY_SEPARATOR . 'files';
}

/**
 * Get blogs.dir absolute path by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_blogsdir_path( $blog_id = null ) {
	if ( s2sm_main_site( $blog_id ) ) {
		return '/wp-content/blogs.dir/';
	}

	return "/wp-content/blogs.dir/{$blog_id}/files/";
}

/**
 * Get blogs.dir URL by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_blogsdir_url( $blog_id = null ) {
	if ( s2sm_main_site( $blog_id ) ) {
		return get_site_url( $blog_id, '/wp-content/blogs.dir/' );
	}

	return get_site_url( $blog_id, "/wp-content/blogs.dir/{$blog_id}/files/" );
}

/**
 * Get uploads absolute path by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_uploads_path( $blog_id = null ) {
	if ( s2sm_main_site( $blog_id ) ) {
		return '/wp-content/uploads/';
	}

	return "/wp-content/uploads/sites/{$blog_id}/";
}

/**
 * Get uploads URL by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_uploads_url( $blog_id = null ) {
	if ( s2sm_main_site( $blog_id ) ) {
		return get_site_url( $blog_id, '/wp-content/uploads/' );
	}

	return get_site_url( $blog_id, "/wp-content/uploads/sites/{$blog_id}/" );
}

/**
 * Get ServMask table prefix by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_servmask_prefix( $blog_id = null ) {
	// Set base table prefix
	if ( s2sm_main_site( $blog_id ) ) {
		return S2SM_TABLE_PREFIX;
	}

	return S2SM_TABLE_PREFIX . $blog_id . '_';
}

/**
 * Get WordPress table prefix by blog ID
 *
 * @param  integer $blog_id Blog ID
 * @return string
 */
function s2sm_table_prefix( $blog_id = null ) {
	global $wpdb;

	// Set base table prefix
	if ( s2sm_main_site( $blog_id ) ) {
		return $wpdb->base_prefix;
	}

	return $wpdb->base_prefix . $blog_id . '_';
}

/**
 * Get default content filters
 *
 * @param  array $filters List of files and directories
 * @return array
 */
function s2sm_content_filters( $filters = array() ) {
	return array_merge( $filters, array(
		S2SM_BACKUPS_NAME,
		S2SM_PACKAGE_NAME,
		S2SM_MULTISITE_NAME,
		S2SM_DATABASE_NAME,
	) );
}

/**
 * Get default plugin filters
 *
 * @param  array $filters List of plugins
 * @return array
 */
function s2sm_plugin_filters( $filters = array() ) {
	// WP Migration Plugin
	if ( defined( 'S2SM_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SM_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration';
	}

	// Dropbox Extension
	if ( defined( 'S2SMDE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMDE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-dropbox-extension';
	}

	// Google Drive Extension
	if ( defined( 'S2SMGE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMGE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-gdrive-extension';
	}

	// Amazon S3 Extension
	if ( defined( 'S2SMSE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMSE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-s3-extension';
	}

	// Multisite Extension
	if ( defined( 'S2SMME_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMME_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-multisite-extension';
	}

	// Unlimited Extension
	if ( defined( 'S2SMUE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMUE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-unlimited-extension';
	}

	// FTP Extension
	if ( defined( 'S2SMFE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMFE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-ftp-extension';
	}

	// URL Extension
	if ( defined( 'S2SMLE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMLE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-url-extension';
	}

	// OneDrive Extension
	if ( defined( 'S2SMOE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMOE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-onedrive-extension';
	}

	// Box Extension
	if ( defined( 'S2SMBE_PLUGIN_BASENAME' ) ) {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . dirname( S2SMBE_PLUGIN_BASENAME );
	} else {
		$filters[] = 'plugins' . DIRECTORY_SEPARATOR . 'all-in-one-wp-migration-box-extension';
	}

	return $filters;
}

/**
 * Get active ServMask plugins
 *
 * @return array
 */
function s2sm_active_servmask_plugins( $plugins = array() ) {
	// WP Migration Plugin
	if ( defined( 'S2SM_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SM_PLUGIN_BASENAME;
	}

	// Dropbox Extension
	if ( defined( 'S2SMDE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMDE_PLUGIN_BASENAME;
	}

	// Google Drive Extension
	if ( defined( 'S2SMGE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMGE_PLUGIN_BASENAME;
	}

	// Amazon S3 Extension
	if ( defined( 'S2SMSE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMSE_PLUGIN_BASENAME;
	}

	// Multisite Extension
	if ( defined( 'S2SMME_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMME_PLUGIN_BASENAME;
	}

	// Unlimited Extension
	if ( defined( 'S2SMUE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMUE_PLUGIN_BASENAME;
	}

	// FTP Extension
	if ( defined( 'S2SMFE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMFE_PLUGIN_BASENAME;
	}

	// URL Extension
	if ( defined( 'S2SMLE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMLE_PLUGIN_BASENAME;
	}

	// OneDrive Extension
	if ( defined( 'S2SMOE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMOE_PLUGIN_BASENAME;
	}

	// Box Extension
	if ( defined( 'S2SMBE_PLUGIN_BASENAME' ) ) {
		$plugins[] = S2SMBE_PLUGIN_BASENAME;
	}

	return $plugins;
}

/**
 * Get active sitewide plugins
 *
 * @return array
 */
function s2sm_active_sitewide_plugins() {
	return array_keys( get_site_option( S2SM_ACTIVE_SITEWIDE_PLUGINS, array() ) );
}

/**
 * Get active plugins
 *
 * @return array
 */
function s2sm_active_plugins() {
	return array_values( get_option( S2SM_ACTIVE_PLUGINS, array() ) );
}

/**
 * Set active sitewide plugins (inspired by WordPress activate_plugins() function)
 *
 * @param  array   $plugins List of plugins
 * @return boolean
 */
function s2sm_activate_sitewide_plugins( $plugins ) {
	$current = get_site_option( S2SM_ACTIVE_SITEWIDE_PLUGINS, array() );

	// Add plugins
	foreach ( $plugins as $plugin ) {
		if ( ! isset( $current[ $plugin ] ) && ! is_wp_error( validate_plugin( $plugin ) ) ) {
			$current[ $plugin ] = time();
		}
	}

	return update_site_option( S2SM_ACTIVE_SITEWIDE_PLUGINS, $current );
}

/**
 * Set active plugins (inspired by WordPress activate_plugins() function)
 *
 * @param  array   $plugins List of plugins
 * @return boolean
 */
function s2sm_activate_plugins( $plugins ) {
	$current = get_option( S2SM_ACTIVE_PLUGINS, array() );

	// Add plugins
	foreach ( $plugins as $plugin ) {
		if ( ! in_array( $plugin, $current ) && ! is_wp_error( validate_plugin( $plugin ) ) ) {
			$current[] = $plugin;
		}
	}

	sort( $current );

	return update_option( S2SM_ACTIVE_PLUGINS, $current );
}

/**
 * Flush WP options cache
 *
 * @return void
 */
function s2sm_cache_flush() {
	// Initialize WP cache
	wp_cache_init();

	// Flush WP cache
	wp_cache_flush();

	// Set WP cache
	wp_cache_set( 'alloptions', array(), 'options' );
	wp_cache_set( 'notoptions', array(), 'options' );

	// Delete WP cache
	wp_cache_delete( 'alloptions', 'options' );
	wp_cache_delete( 'notoptions', 'options' );
}


/**
 * URL encode
 *
 * @param  mixed $value Value to encode
 * @return mixed
 */
function s2sm_urlencode( $value ) {
	return is_array( $value ) ? array_map( 's2sm_urlencode', $value ) : urlencode( $value );
}

/**
 * URL decode
 *
 * @param  mixed $value Value to decode
 * @return mixed
 */
function s2sm_urldecode( $value ) {
	return is_array( $value ) ? array_map( 's2sm_urldecode', $value ) : urldecode( stripslashes( $value ) );
}

/**
 * Opens a file in specified mode
 *
 * @param  string $file Path to the file to open
 * @param  string $mode Mode in which to open the file
 * @return resource
 * @throws Exception
 */
function s2sm_open( $file, $mode ) {
	$file_handle = fopen( $file, $mode );
	if ( false === $file_handle ) {
		throw new S2sm_Not_Accesible_Exception( sprintf( __( 'Unable to open %s with mode %s', S2SM_PLUGIN_NAME ), $file, $mode ) );
	}

	return $file_handle;
}

/**
 * Write contents to a file
 *
 * @param  resource $handle  File handle to write to
 * @param  string   $content Contents to write to the file
 * @return int
 * @throws Exception
 */
function s2sm_write( $handle, $content ) {
	$write_result = fwrite( $handle, $content );
	if ( false === $write_result ) {
		if ( ( $meta = stream_get_meta_data( $handle ) ) ) {
			throw new S2sm_Not_Writable_Exception( sprintf( __( 'Unable to write to: %s', S2SM_PLUGIN_NAME ), $meta['uri'] ) );
		}
	} elseif ( strlen( $content ) !== $write_result ) {
		throw new S2sm_Quota_Exceeded_Exception( __( 'Out of disk space.', S2SM_PLUGIN_NAME ) );
	}

	return $write_result;
}

/**
 * Read contents from a file
 *
 * @param  resource $handle   File handle to read from
 * @param  string   $filesize File size
 * @return int
 * @throws Exception
 */
function s2sm_read( $handle, $filesize ) {
	$read_result = fread( $handle, $filesize );
	if ( false === $read_result ) {
		if ( ( $meta = stream_get_meta_data( $handle ) ) ) {
			throw new S2sm_Not_Readable_Exception( sprintf( __( 'Unable to read file: %s', S2SM_PLUGIN_NAME ), $meta['uri'] ) );
		}
	}

	return $read_result;
}

/**
 * Closes a file handle
 *
 * @param  resource $handle File handle to close
 * @return bool
 */
function s2sm_close( $handle ) {
	return @fclose( $handle );
}

/**
 * Deletes a file
 *
 * @param  string $file Path to file to delete
 * @return bool
 */
function s2sm_unlink( $file ) {
	return @unlink( $file );
}

/**
 * Copies one file's contents to another
 *
 * @param  string   $source_file      File to copy the contents from
 * @param  string   $destination_file File to copy the contents to
 */
function s2sm_copy( $source_file, $destination_file ) {
	$source_handle = s2sm_open( $source_file, 'rb' );
	$destination_handle = s2sm_open( $destination_file, 'ab' );
	while ( $buffer = s2sm_read( $source_handle, 4096 ) ) {
		s2sm_write( $destination_handle, $buffer );
	}
	s2sm_close( $source_handle );
	s2sm_close( $destination_handle );
}

/**
 * Sanitize path
 *
 * @param  string  $path           Path string
 * @param  boolean $leading_slash  Add leading slash
 * @param  boolean $trailing_slash Add trailing slash
 * @return string
 */
function s2sm_sanitize_path( $path, $leading_slash = false, $trailing_slash = false ) {
	// Strip leadning and trailing whitespaces
	$path = trim( $path );

	// Strip leading backward and forward slashes
	$path = ltrim( $path, '/\\' );

	// Strip trailing backward and forward slashes
	$path = rtrim( $path, '/\\' );

	// Add forward leading slash
	if ( $leading_slash ) {
		$path = sprintf( '/%s', $path );
	}

	// Add forward trailing slash
	if ( $trailing_slash ) {
		$path = sprintf( '%s/', $path );
	}

	return preg_replace( '/[\\\\\/]+/', '/', $path );
}

/**
 * Get the size of file in bytes
 *
 * This method supports files > 2GB on PHP x86
 *
 * @param string $file_path Path to the file
 * @param bool   $as_string Return the filesize as string instead of BigInteger
 *
 * @return mixed Math_BigInteger|string|null
 */
function s2sm_filesize( $file_path, $as_string = true ) {
	$chunk_size = 2000000; // 2MB
	$file_size  = new Math_BigInteger( 0 );

	try {
		$file_handle = s2sm_open( $file_path, 'rb' );

		while ( ! feof( $file_handle ) ) {
			$bytes     = s2sm_read( $file_handle, $chunk_size );
			$file_size = $file_size->add( new Math_BigInteger( strlen( $bytes ) ) );
		}

		s2sm_close( $file_handle );

		return $as_string ? $file_size->toString() : $file_size;
	} catch ( Exception $e ) {
		return null;
	}
}

/**
 * Return the smaller of two numbers
 *
 * @param Math_BigInteger $a First number
 * @param Math_BigInteger $b Second number
 *
 * @return Math_BigInteger
 */
function s2sm_find_smaller_number( Math_BigInteger $a, Math_BigInteger $b ) {
	if ( $a->compare( $b ) === -1 ) {
		return $a;
	}

	return $b;
}

/**
 * Wrapper around fseek
 *
 * This function works with offsets that are > PHP_INT_MAX
 *
 * @param resource        $file_handle Handle to the file
 * @param Math_BigInteger $offset      Offset of the file
 */
function s2sm_fseek( $file_handle, Math_BigInteger $offset ) {
	$chunk_size = s2sm_find_smaller_number( new Math_BigInteger( 2000000 ), $offset );
	while ( ! feof( $file_handle ) && $offset->toString() != '0' ) {
		$bytes      = s2sm_read( $file_handle, $chunk_size->toInteger() );
		$offset     = $offset->subtract( new Math_BigInteger( strlen( $bytes ) ) );
		$chunk_size = s2sm_find_smaller_number( $chunk_size, $offset );
	}
}
