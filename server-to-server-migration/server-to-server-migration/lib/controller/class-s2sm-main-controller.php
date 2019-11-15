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

class S2sm_Main_Controller {

	/**
	 * Main Application Controller
	 *
	 * @return S2sm_Main_Controller
	 */
	public function __construct() {
		register_activation_hook( S2SM_PLUGIN_BASENAME, array( $this, 'activation_hook' ) );

		// Activate hooks
		$this->activate_actions()
			 ->activate_filters()
			 ->activate_textdomain();
	}

	/**
	 * Activation hook callback
	 *
	 * @return Object Instance of this class
	 */
	public function activation_hook() {

	}

	/**
	 * Initializes language domain for the plugin
	 *
	 * @return Object Instance of this class
	 */
	private function activate_textdomain() {
		load_plugin_textdomain( S2SM_PLUGIN_NAME, false, false );

		return $this;
	}

	/**
	 * Register listeners for actions
	 *
	 * @return Object Instance of this class
	 */
	private function activate_actions() {
		// Init
		add_action( 'admin_init', array( $this, 'init' ) );

		// Router
		add_action( 'admin_init', array( $this, 'router' ) );

		// Admin header
		add_action( 'admin_head', array( $this, 'admin_head' ) );

		// Create initial folders
		add_action( 'admin_init', array( $this, 'create_folders' ) );

		// All in One WP Migration
		add_action( 'plugins_loaded', array( $this, 's2sm_loaded' ), 20 );

		// Export and import commands
		add_action( 'plugins_loaded', array( $this, 's2sm_commands' ), 10 );

		// Export and import buttons
		add_action( 'plugins_loaded', array( $this, 's2sm_buttons' ), 10 );

		// Add export scripts and styles
		add_action( 'admin_enqueue_scripts', array( $this, 'register_export_scripts_and_styles' ), 10 );

		// Add import scripts and styles
		add_action( 'admin_enqueue_scripts', array( $this, 'register_import_scripts_and_styles' ), 10 );

		// Add backups scripts and styles
		add_action( 'admin_enqueue_scripts', array( $this, 'register_backups_scripts_and_styles' ), 10 );

		// Add updater scripts and styles
		add_action( 'admin_enqueue_scripts', array( $this, 'register_updater_scripts_and_styles' ), 10 );

		return $this;
	}

	/**
	 * Register listeners for filters
	 *
	 * @return Object Instance of this class
	 */
	private function activate_filters() {
		// Add a links to plugin list page
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );

		// Add custom schedules
		add_filter( 'cron_schedules', array( $this, 'add_cron_schedules' ) );

		return $this;
	}

	/**
	 * Export and import commands
	 *
	 * @return void
	 */
	public function s2sm_commands() {
		// Add export commands
		add_filter( 's2sm_export', 'S2sm_Export_Init::execute', 5 );
		add_filter( 's2sm_export', 'S2sm_Export_Compatibility::execute', 5 );

		// Do not resolve URL address
		if ( ! isset( $_REQUEST['s2sm_manual_export'] ) ) {
			add_filter( 's2sm_export', 'S2sm_Export_Resolve::execute', 5 );
		}

		add_filter( 's2sm_export', 'S2sm_Export_Archive::execute', 10 );
		add_filter( 's2sm_export', 'S2sm_Export_Config::execute', 50 );
		add_filter( 's2sm_export', 'S2sm_Export_Enumerate::execute', 100 );
		add_filter( 's2sm_export', 'S2sm_Export_Content::execute', 150 );
		add_filter( 's2sm_export', 'S2sm_Export_Database::execute', 200 );
		add_filter( 's2sm_export', 'S2sm_Export_Download::execute', 250 );
		add_filter( 's2sm_export', 'S2sm_Export_Clean::execute', 300 );

		// Add import commands
		add_filter( 's2sm_import', 'S2sm_Import_Upload::execute', 5 );
		add_filter( 's2sm_import', 'S2sm_Import_Upload::executeUrl', 7 );
		add_filter( 's2sm_import', 'S2sm_Import_Compatibility::execute', 10 );

		// Do not resolve URL address
		if ( ! isset( $_REQUEST['s2sm_manual_import'] ) && ! isset( $_REQUEST['s2sm_manual_backups'] ) ) {
			add_filter( 's2sm_import', 'S2sm_Import_Resolve::execute', 10 );
		}

		add_filter( 's2sm_import', 'S2sm_Import_Validate::execute', 50 );
		add_filter( 's2sm_import', 'S2sm_Import_Confirm::execute', 100 );
		add_filter( 's2sm_import', 'S2sm_Import_Blogs::execute', 150 );
		add_filter( 's2sm_import', 'S2sm_Import_Enumerate::execute', 200 );
		add_filter( 's2sm_import', 'S2sm_Import_Content::execute', 250 );
		add_filter( 's2sm_import', 'S2sm_Import_Plugins::execute', 270 );
		add_filter( 's2sm_import', 'S2sm_Import_Database::execute', 300 );
		add_filter( 's2sm_import', 'S2sm_Import_Done::execute', 350 );
		add_filter( 's2sm_import', 'S2sm_Import_Clean::execute', 400 );
	}

	/**
	 * Export and import buttons
	 *
	 * @return void
	 */
	public function s2sm_buttons() {
		// Add export buttons
		add_filter( 's2sm_export_buttons', 'S2sm_Export_Controller::buttons' );

		// Add import buttons
		add_filter( 's2sm_import_buttons', 'S2sm_Import_Controller::buttons' );
	}

	/**
	 * All in One WP Migration loaded
	 *
	 * @return void
	 */
	public function s2sm_loaded() {
		if ( is_multisite() ) {
			if ( apply_filters( 's2sm_multisite_menu', false ) ) {
				add_action( 'network_admin_menu', array( $this, 'admin_menu' ) );
			} else {
				add_action( 'network_admin_notices', array( $this, 'multisite_notice' ) );
			}
		} else {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		}

		// Add automatic plugins update
		add_action( 'wp_maybe_auto_update', 'S2sm_Updater_Controller::check_for_updates' );

		// Add chunk size limit
		add_filter( 's2sm_max_chunk_size', 'S2sm_Import_Controller::max_chunk_size' );

		// Add plugins api
		add_filter( 'plugins_api', 'S2sm_Updater_Controller::plugins_api', 20, 3 );

		// Add plugins updates
		add_filter( 'pre_set_site_transient_update_plugins', 'S2sm_Updater_Controller::pre_update_plugins' );

		// Add plugins metadata
		add_filter( 'site_transient_update_plugins', 'S2sm_Updater_Controller::update_plugins' );

		// Add "Check for updates" link to plugin list page
		add_filter( 'plugin_row_meta', 'S2sm_Updater_Controller::plugin_row_meta', 10, 2 );
	}

	/**
	 * Display multisite notice
	 *
	 * @return void
	 */
	public function multisite_notice() {
		S2sm_Template::render( 'main/multisite-notice' );
	}

	/**
	 * Display storage directory notice
	 *
	 * @return void
	 */
	public function storage_notice() {
		S2sm_Template::render( 'main/storage-notice' );
	}

	/**
	 * Display index file notice
	 *
	 * @return void
	 */
	public function index_notice() {
		S2sm_Template::render( 'main/index-notice' );
	}

	/**
	 * Display backups directory notice
	 *
	 * @return void
	 */
	public function backups_notice() {
		S2sm_Template::render( 'main/backups-notice' );
	}

	/**
	 * Add a links to plugin list page
	 *
	 * @return array
	 */
	public function plugin_row_meta( $links, $file ) {
		if ( $file == S2SM_PLUGIN_BASENAME ) {
			$links[] = S2sm_Template::get_content( 'main/get-support' );
		}

		return $links;
	}

	/**
	 * Create folders needed for plugin operation, if they don't exist
	 *
	 * @return void
	 */
	public function create_folders() {
		// Check if storage folder exist
		if ( ! is_dir( S2SM_STORAGE_PATH ) ) {

			// Folder doesn't exist, attempt to create it
			if ( ! mkdir( S2SM_STORAGE_PATH ) ) {

				// We couldn't create the folder, so let's tell the user
				if ( is_multisite() ) {
					return add_action( 'network_admin_notices', array( $this, 'storage_notice' ) );
				} else {
					return add_action( 'admin_notices', array( $this, 'storage_notice' ) );
				}
			}
		}

		// Create index.php in storage folder
		S2sm
_File_Index::create( S2SM_STORAGE_INDEX );

		// Check if backups folder exist
		if ( ! is_dir( S2SM_BACKUPS_PATH ) ) {

			// Folder doesn't exist, attempt to create it
			if ( ! mkdir( S2SM_BACKUPS_PATH ) ) {

				// We couldn't create the folder, so let's tell the user
				if ( is_multisite() ) {
					return add_action( 'network_admin_notices', array( $this, 'backups_notice' ) );
				} else {
					return add_action( 'admin_notices', array( $this, 'backups_notice' ) );
				}
			}
		}

		// Create index.php in backups folder
		S2sm_File_Index::create( S2SM_BACKUPS_INDEX );

		// Create .htaccess in backups folder
		S2sm_File_Htaccess::create( S2SM_BACKUPS_HTACCESS );

		// Create web.config in backups folder
		S2sm_File_Webconfig::create( S2SM_BACKUPS_WEBCONFIG );
	}

	/**
	 * Register plugin menus
	 *
	 * @return void
	 */
	public function admin_menu() {
		// top level WP Migration menu
		add_menu_page(
			'Server-to-Server Migration',
			'Server-to-Server Migration',
			'export',
			'site-migration-export',
			'S2sm_Export_Controller::index',
			'',
			'76.295'
		);

		// sublevel Export menu
		add_submenu_page(
			'site-migration-export',
			__( 'Export', S2SM_PLUGIN_NAME ),
			__( 'Export', S2SM_PLUGIN_NAME ),
			'export',
			'site-migration-export',
			'S2sm_Export_Controller::index'
		);

		// sublevel Import menu
		add_submenu_page(
			'site-migration-export',
			__( 'Import', S2SM_PLUGIN_NAME ),
			__( 'Import', S2SM_PLUGIN_NAME ),
			'import',
			'site-migration-import',
			'S2sm_Import_Controller::index'
		);

		// sublevel Backups menu
		add_submenu_page(
			'site-migration-export',
			__( 'Backups', S2SM_PLUGIN_NAME ),
			__( 'Backups', S2SM_PLUGIN_NAME ),
			'import',
			'site-migration-backups',
			'S2sm_Backups_Controller::index'
		);
	}

	/**
	 * Register scripts and styles for Export Controller
	 *
	 * @return void
	 */
	public function register_export_scripts_and_styles( $hook ) {
		if ( 'toplevel_page_site-migration-export' !== $hook ) {
			return;
		}

		do_action( 's2sm_register_export_scripts_and_styles' );

		// we don't want heartbeat to occur when exporting
		wp_deregister_script( 'heartbeat' );

		wp_enqueue_style(
			's2sm-css-export',
			S2sm_Template::asset_link( 'css/export.min.css' )
		);
		wp_enqueue_script(
			's2sm-js-export',
			S2sm_Template::asset_link( 'javascript/export.min.js' ),
			array( 'jquery' )
		);
		wp_localize_script( 's2sm-js-export', 's2sm_feedback', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_feedback' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-export', 's2sm_report', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_report' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-export', 's2sm_export', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_export' ) ),
			),
			'status' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_status' ) ),
			),
			'secret_key' => get_option( S2SM_SECRET_KEY ),
		) );
	}

	/**
	 * Register scripts and styles for Import Controller
	 *
	 * @return void
	 */
	public function register_import_scripts_and_styles( $hook ) {
		if ( 'server-to-server-migration_page_site-migration-import' !== $hook ) {
			return;
		}

		do_action( 's2sm_register_import_scripts_and_styles' );

		// we don't want heartbeat to occur when importing
		wp_deregister_script( 'heartbeat' );

		wp_enqueue_style(
			's2sm-css-import',
			S2sm_Template::asset_link( 'css/import.min.css' )
		);
		wp_enqueue_script(
			's2sm
-js-import',
			S2sm_Template::asset_link( 'javascript/import.min.js' ),
			array( 'jquery' )
		);
		wp_localize_script( 's2sm-js-import', 's2sm_uploader', array(
			'chunk_size'  => apply_filters( 's2sm_max_chunk_size', S2SM_MAX_CHUNK_SIZE ),
			'max_retries' => apply_filters( 's2sm_max_chunk_retries', S2SM_MAX_CHUNK_RETRIES ),
			'url'         => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_import' ) ),
			'params'      => array(
				'priority'   => 5,
				'secret_key' => get_option( S2SM_SECRET_KEY ),
			),
			'filters'     => array(
				's2sm_archive_extension' => array( 'wpress', 'bin' ),
				's2sm_archive_size'      => apply_filters( 's2sm_max_file_size', S2SM_MAX_FILE_SIZE ),
			),
		) );
		wp_localize_script( 's2sm-js-import', 's2sm_feedback', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_feedback' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-import', 's2sm_report', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_report' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-import', 's2sm_import', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_import' ) ),
			),
			'status' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_status' ) ),
			),
			'secret_key' => get_option( S2SM_SECRET_KEY ),
			'oversize'   => sprintf(
				__(
					'The file that you are trying to import is over the maximum upload file size limit of <strong>%s</strong>.<br />' .
					'You can remove this restriction by purchasing our ' .
					'<a href="https://migzara.com/products/unlimited-extension" target="_blank">Unlimited Extension</a>.',
					S2SM_PLUGIN_NAME
				),
				size_format( apply_filters( 's2sm_max_file_size', S2SM_MAX_FILE_SIZE ) )
			),
			'invalid_extension' => sprintf(
				__(
					'Version 2.1.1 of All in One WP Migration introduces new compression algorithm. ' .
					'It makes exporting and importing 10 times faster.' .
					'<br />Unfortunately, the new format is not back compatible with backups made with earlier ' .
					'versions of the plugin.' .
					'<br />You can either create a new backup with the latest version of the ' .
					'plugin, or convert the archive to the new format using our tools ' .
					'<a href="%s" target="_blank">here</a>.',
					S2SM_PLUGIN_NAME
				),
				S2SM_ARCHIVE_TOOLS_URL
			),
		) );
	}

	/**
	 * Register scripts and styles for Backups Controller
	 *
	 * @return void
	 */
	public function register_backups_scripts_and_styles( $hook ) {
		if ( 'server-to-server-migration_page_site-migration-backups' !== $hook ) {
			return;	
		}

		do_action( 's2sm_register_backups_scripts_and_styles' );

		wp_enqueue_style(
			's2sm-css-backups',
			S2sm_Template::asset_link( 'css/backups.min.css' )
		);
		wp_enqueue_script(
			's2sm
-js-backups',
			S2sm_Template::asset_link( 'javascript/backups.min.js' ),
			array( 'jquery' )
		);
		wp_localize_script( 's2sm-js-backups', 's2sm_feedback', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_feedback' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-backups', 's2sm_report', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_report' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-backups', 's2sm_backups', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_backups' ) ),
			),
		) );
		wp_localize_script( 's2sm-js-backups', 's2sm_import', array(
			'ajax' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_import' ) ),
			),
			'status' => array(
				'url' => wp_make_link_relative( admin_url( 'admin-ajax.php?action=s2sm_status' ) ),
			),
			'secret_key' => get_option( S2SM_SECRET_KEY ),
		) );
	}

	/**
	 * Register scripts and styles for Updater Controller
	 *
	 * @return void
	 */
	public function register_updater_scripts_and_styles( $hook ) {
		if ( 'plugins.php' !== $hook ) {
			return;
		}

		do_action( 's2sm_register_updater_scripts_and_styles' );

		wp_enqueue_style(
			's2sm-css-updater',
			S2sm_Template::asset_link( 'css/updater.min.css' )
		);
		wp_enqueue_script(
			's2sm-js-updater',
			S2sm_Template::asset_link( 'javascript/updater.min.js' ),
			array( 'jquery' )
		);
		wp_localize_script( 's2sm-js-updater', 's2sm_updater', array(
			'ajax' => array(
				'url' => admin_url( 'admin-ajax.php?action=s2sm_updater' ),
			),
		) );
	}

	/**
	 * Outputs menu icon between head tags
	 *
	 * @return void
	 */
	public function admin_head() {
		global $wp_version;

		// Admin header
		S2sm
_Template::render( 'main/admin-head', array( 'version' => $wp_version ) );
	}

	/**
	 * Register initial parameters
	 *
	 * @return void
	 */
	public function init() {
		// Set secret key
		if ( ! get_option( S2SM_SECRET_KEY ) ) {
			update_option( S2SM_SECRET_KEY, wp_generate_password( 12, false ) );
		}

		// Set username
		if ( isset( $_SERVER['PHP_AUTH_USER'] ) ) {
			update_option( S2SM_AUTH_USER, $_SERVER['PHP_AUTH_USER'] );
		} else if ( isset( $_SERVER['REMOTE_USER'] ) ) {
			update_option( S2SM_AUTH_USER, $_SERVER['REMOTE_USER'] );
		}

		// Set password
		if ( isset( $_SERVER['PHP_AUTH_PW'] ) ) {
			update_option( S2SM_AUTH_PASSWORD, $_SERVER['PHP_AUTH_PW'] );
		}

		// Check for updates
		if ( isset( $_GET['s2sm_updater'] ) ) {
			if ( current_user_can( 'update_plugins' ) && check_admin_referer( 's2sm_updater_nonce' ) ) {
				S2sm_Updater::check_for_updates();
			}
		}
	}

	/**
	 * Register initial router
	 *
	 * @return void
	 */
	public function router() {
		// Public
		add_action( 'wp_ajax_nopriv_s2sm_export', 'S2sm_Export_Controller::export' );
		add_action( 'wp_ajax_nopriv_s2sm_import', 'S2sm_Import_Controller::import' );
		add_action( 'wp_ajax_nopriv_s2sm_status', 'S2sm_Status_Controller::status' );
		add_action( 'wp_ajax_nopriv_s2sm_resolve', 'S2sm_Resolve_Controller::resolve' );

		// Update
		if ( current_user_can( 'update_plugins' ) ) {
			add_action( 'wp_ajax_s2sm_updater', 'S2sm_Updater_Controller::updater' );
		}

		// Export
		if ( current_user_can( 'export' ) ) {
			add_action( 'wp_ajax_s2sm_export', 'S2sm_Export_Controller::export' );
		}

		// Import
		if ( current_user_can( 'import' ) ) {
			add_action( 'wp_ajax_s2sm_import', 'S2sm_Import_Controller::import' );
		}

		// Both
		if ( current_user_can( 'export' ) || current_user_can( 'import' ) ) {
			add_action( 'wp_ajax_s2sm_backups', 'S2sm_Backups_Controller::delete' );
			add_action( 'wp_ajax_s2sm_feedback', 'S2sm_Feedback_Controller::feedback' );
			add_action( 'wp_ajax_s2sm_report', 'S2sm_Report_Controller::report' );
			add_action( 'wp_ajax_s2sm_status', 'S2sm_Status_Controller::status' );
			add_action( 'wp_ajax_s2sm_resolve', 'S2sm_Resolve_Controller::resolve' );
		}
	}

	/**
	 * Add custom cron schedules
	 *
	 * @param  array $schedules List of schedules
	 * @return array
	 */
	public function add_cron_schedules( $schedules ) {
		$schedules['weekly'] = array(
			'display'  => __( 'Weekly', S2SM_PLUGIN_NAME ),
			'interval' => 60 * 60 * 24 * 7,
		);
		$schedules['monthly'] = array(
			'display'  => __( 'Monthly', S2SM_PLUGIN_NAME ),
			'interval' => ( strtotime( '+1 month' ) - time() ),
		);

		return $schedules;
	}
}
