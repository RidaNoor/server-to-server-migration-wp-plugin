<?php
/**
 * Plugin Name: Server-to-Server Migration
 * Plugin URI: https://migzara.com/
 * Description: Migration tool for all your blog data. Import or Export your blog content with a single click.
 * Author: RidaNoor
 * Author URI: https://migzara.com/
 * Version: 6.40
 * Text Domain: server-to-server-migration
 * Domain Path: /languages
 * Network: True
 *
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

 */

@ignore_user_abort( true );
@set_time_limit( 0 );
@ini_set( 'max_input_time', '-1' );

// Check SSL Mode
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && ( $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) ) {
	$_SERVER['HTTPS'] = 'on';
}

// Plugin Basename
define( 'S2SM
_PLUGIN_BASENAME',  basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ) );

// Plugin Path
define( 'S2SM
_PATH', dirname( __FILE__ ) );

// Plugin Url
define( 'S2SM
_URL', plugins_url( '', S2SM
_PLUGIN_BASENAME ) );

// Plugin Storage Url
define( 'S2SM
_STORAGE_URL', plugins_url( 'storage', S2SM
_PLUGIN_BASENAME ) );

// Plugin Backups Url
define( 'S2SM
_BACKUPS_URL', content_url( 's2sm
-backups', S2SM
_PLUGIN_BASENAME ) );

// Themes Absolute Path
define( 'S2SM
_THEMES_PATH', get_theme_root() );

// Include constants
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'constants.php';

// Include deprecated
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'deprecated.php';

// Include functions
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'functions.php';

// Include exceptions
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'exceptions.php';

// Include loader
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'loader.php';

// ==========================================================================
// = All app initialization is done in S2sm
_Main_Controller __constructor. =
// ==========================================================================
$main_controller = new S2sm
_Main_Controller();
