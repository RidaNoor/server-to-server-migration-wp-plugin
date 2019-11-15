<?php
/**
 * Copyright (C) 2014-2017 Migzara
 *
 
 */

// ================
// = Plugin Debug =
// ================
define( 'S2SM_DEBUG', false );

// ==================
// = Plugin Version =
// ==================
define( 'S2SM_VERSION', '6.40' );

// ===============
// = Plugin Name =
// ===============
define( 'S2SM_PLUGIN_NAME', 'all-in-one-wp-migration' );

// ===================
// = Directory Index =
// ===================
define( 'S2SM_DIRECTORY_INDEX', 'index.php' );

// ================
// = Storage Path =
// ================
define( 'S2SM_STORAGE_PATH', S2SM_PATH . DIRECTORY_SEPARATOR . 'storage' );

// ==================
// = Error Log Path =
// ==================
define( 'S2SM_ERROR_FILE', S2SM_STORAGE_PATH . DIRECTORY_SEPARATOR . 'error.log' );

// ===============
// = Status Path =
// ===============
define( 'S2SM_STATUS_FILE', S2SM_STORAGE_PATH . DIRECTORY_SEPARATOR . 'status.js' );

// ============
// = Lib Path =
// ============
define( 'S2SM_LIB_PATH', S2SM_PATH . DIRECTORY_SEPARATOR . 'lib' );

// ===================
// = Controller Path =
// ===================
define( 'S2SM_CONTROLLER_PATH', S2SM_LIB_PATH . DIRECTORY_SEPARATOR . 'controller' );

// ==============
// = Model Path =
// ==============
define( 'S2SM_MODEL_PATH', S2SM_LIB_PATH . DIRECTORY_SEPARATOR . 'model' );

// ===============
// = Export Path =
// ===============
define( 'S2SM_EXPORT_PATH', S2SM_MODEL_PATH . DIRECTORY_SEPARATOR . 'export' );

// ===============
// = Import Path =
// ===============
define( 'S2SM_IMPORT_PATH', S2SM_MODEL_PATH . DIRECTORY_SEPARATOR . 'import' );

// =============
// = Http Path =
// =============
define( 'S2SM_HTTP_PATH', S2SM_MODEL_PATH . DIRECTORY_SEPARATOR . 'http' );

// =============
// = View Path =
// =============
define( 'S2SM_TEMPLATES_PATH', S2SM_LIB_PATH . DIRECTORY_SEPARATOR . 'view' );

// ===================
// = Set Bandar Path =
// ===================
define( 'BANDAR_TEMPLATES_PATH', S2SM_TEMPLATES_PATH );

// ===============
// = Vendor Path =
// ===============
define( 'S2SM_VENDOR_PATH', S2SM_LIB_PATH . DIRECTORY_SEPARATOR . 'vendor' );

// =========================
// = ServMask Feedback Url =
// =========================
define( 'S2SM_FEEDBACK_URL', 'https://migzara.com/s2sm/feedback/create' );

// =======================
// = ServMask Report Url =
// =======================
define( 'S2SM_REPORT_URL', 'https://migzara.com/s2sm/report/create' );

// ==============================
// = ServMask Archive Tools Url =
// ==============================
define( 'S2SM_ARCHIVE_TOOLS_URL', 'https://migzara.com/archive/tools' );

// =========================
// = ServMask Table Prefix =
// =========================
define( 'S2SM_TABLE_PREFIX', 'SERVMASK_PREFIX_' );

// ========================
// = Archive Backups Name =
// ========================
define( 'S2SM_BACKUPS_NAME', 's2sm-backups' );

// =========================
// = Archive Database Name =
// =========================
define( 'S2SM_DATABASE_NAME', 'database.sql' );

// ========================
// = Archive Package Name =
// ========================
define( 'S2SM_PACKAGE_NAME', 'package.json' );

// ==========================
// = Archive Multisite Name =
// ==========================
define( 'S2SM_MULTISITE_NAME', 'multisite.json' );

// ======================
// = Archive Blogs Name =
// ======================
define( 'S2SM_BLOGS_NAME', 'blogs.json' );

// ========================
// = Archive FileMap Name =
// ========================
define( 'S2SM_FILEMAP_NAME', 'filemap.list' );

// =================================
// = Archive Must-Use Plugins Name =
// =================================
define( 'S2SM_MUPLUGINS_NAME', 'mu-plugins' );

// ===================
// = Export Log Name =
// ===================
define( 'S2SM_EXPORT_NAME', 'export.log' );

// ===================
// = Import Log Name =
// ===================
define( 'S2SM_IMPORT_NAME', 'import.log' );

// ==================
// = Error Log Name =
// ==================
define( 'S2SM_ERROR_NAME', 'error.log' );

// ==========
// = URL IP =
// ==========
define( 'S2SM_URL_IP', 's2sm_url_ip' );

// ===============
// = URL Adapter =
// ===============
define( 'S2SM_URL_ADAPTER', 's2sm_url_adapter' );

// ==============
// = Secret Key =
// ==============
define( 'S2SM_SECRET_KEY', 's2sm_secret_key' );

// =============
// = Auth User =
// =============
define( 'S2SM_AUTH_USER', 's2sm_auth_user' );

// =================
// = Auth Password =
// =================
define( 'S2SM_AUTH_PASSWORD', 's2sm_auth_password' );

// ==================
// = Active Plugins =
// ==================
define( 'S2SM_ACTIVE_PLUGINS', 'active_plugins' );

// ===========================
// = Active Sitewide Plugins =
// ===========================
define( 'S2SM_ACTIVE_SITEWIDE_PLUGINS', 'active_sitewide_plugins' );

// ======================
// = MS Files Rewriting =
// ======================
define( 'S2SM_MS_FILES_REWRITING', 'ms_files_rewriting' );

// ===============
// = Updater Key =
// ===============
define( 'S2SM_UPDATER', 's2sm_updater' );

// ==============
// = Status Key =
// ==============
define( 'S2SM_STATUS', 's2sm_status' );

// =================
// = Support Email =
// =================
define( 'S2SM_SUPPORT_EMAIL', 'support@migzara.com' );

// =================
// = Max File Size =
// =================
define( 'S2SM_MAX_FILE_SIZE', 536870912 );

// ==================
// = Max Chunk Size =
// ==================
define( 'S2SM_MAX_CHUNK_SIZE', 5242880 );

// =====================
// = Max Chunk Retries =
// =====================
define( 'S2SM_MAX_CHUNK_RETRIES', 10 );

// ===========================
// = WP_CONTENT_DIR Constant =
// ===========================
if ( ! defined( 'WP_CONTENT_DIR' ) ) {
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
}

// ================
// = Uploads Path =
// ================
define( 'S2SM_UPLOADS_PATH', 'uploads' );

// ==============
// = Blogs Path =
// ==============
define( 'S2SM_BLOGSDIR_PATH', 'blogs.dir' );

// ==============
// = Sites Path =
// ==============
define( 'S2SM_SITES_PATH', S2SM_UPLOADS_PATH . DIRECTORY_SEPARATOR . 'sites' );

// ================
// = Backups Path =
// ================
define( 'S2SM_BACKUPS_PATH', WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 's2sm-backups' );

// ======================
// = Storage Index File =
// ======================
define( 'S2SM_STORAGE_INDEX', S2SM_STORAGE_PATH . DIRECTORY_SEPARATOR . 'index.php' );

// ======================
// = Backups Index File =
// ======================
define( 'S2SM_BACKUPS_INDEX', S2SM_BACKUPS_PATH . DIRECTORY_SEPARATOR . 'index.php' );

// =========================
// = Backups Htaccess File =
// =========================
define( 'S2SM_BACKUPS_HTACCESS', S2SM_BACKUPS_PATH . DIRECTORY_SEPARATOR . '.htaccess' );

// ==========================
// = Backups Webconfig File =
// ==========================
define( 'S2SM_BACKUPS_WEBCONFIG', S2SM_BACKUPS_PATH . DIRECTORY_SEPARATOR . 'web.config' );

// ================================
// = WP Migration Plugin Base Dir =
// ================================
if ( defined( 'S2SM_PLUGIN_BASENAME' ) ) {
	define( 'S2SM_PLUGIN_BASEDIR', dirname( S2SM_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM_PLUGIN_BASEDIR', 'all-in-one-wp-migration' );
}

// ==============================
// = Dropbox Extension Base Dir =
// ==============================
if ( defined( 'S2SMDE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMDE_PLUGIN_BASEDIR', dirname( S2SMDE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMDE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-dropbox-extension' );
}

// ===========================
// = Dropbox Extension About =
// ===========================
if ( ! defined( 'S2SMDE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMDE_PLUGIN_ABOUT', 'https://migzara.com/products/dropbox-extension/about' );
}

// =========================
// = Dropbox Extension Key =
// =========================
if ( ! defined( 'S2SMDE_PLUGIN_KEY' ) ) {
	define( 'S2SMDE_PLUGIN_KEY', 's2smde_plugin_key' );
}

// ===========================
// = Dropbox Extension Short =
// ===========================
if ( ! defined( 'S2SMDE_PLUGIN_SHORT' ) ) {
	define( 'S2SMDE_PLUGIN_SHORT', 'dropbox' );
}

// ===================================
// = Google Drive Extension Base Dir =
// ===================================
if ( defined( 'S2SMGE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMGE_PLUGIN_BASEDIR', dirname( S2SMGE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMGE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-gdrive-extension' );
}

// ================================
// = Google Drive Extension About =
// ================================
if ( ! defined( 'S2SMGE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMGE_PLUGIN_ABOUT', 'https://migzara.com/products/google-drive-extension/about' );
}

// ==============================
// = Google Drive Extension Key =
// ==============================
if ( ! defined( 'S2SMGE_PLUGIN_KEY' ) ) {
	define( 'S2SMGE_PLUGIN_KEY', 's2smge_plugin_key' );
}

// ================================
// = Google Drive Extension Short =
// ================================
if ( ! defined( 'S2SMGE_PLUGIN_SHORT' ) ) {
	define( 'S2SMGE_PLUGIN_SHORT', 'gdrive' );
}

// ================================
// = Amazon S3 Extension Base Dir =
// ================================
if ( defined( 'S2SMSE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMSE_PLUGIN_BASEDIR', dirname( S2SMSE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMSE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-s3-extension' );
}

// =============================
// = Amazon S3 Extension About =
// =============================
if ( ! defined( 'S2SMSE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMSE_PLUGIN_ABOUT', 'https://migzara.com/products/amazon-s3-extension/about' );
}

// ===========================
// = Amazon S3 Extension Key =
// ===========================
if ( ! defined( 'S2SMSE_PLUGIN_KEY' ) ) {
	define( 'S2SMSE_PLUGIN_KEY', 's2smse_plugin_key' );
}

// =============================
// = Amazon S3 Extension Short =
// =============================
if ( ! defined( 'S2SMSE_PLUGIN_SHORT' ) ) {
	define( 'S2SMSE_PLUGIN_SHORT', 's3' );
}

// ================================
// = Multisite Extension Base Dir =
// ================================
if ( defined( 'S2SMME_PLUGIN_BASENAME' ) ) {
	define( 'S2SMME_PLUGIN_BASEDIR', dirname( S2SMME_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMME_PLUGIN_BASEDIR', 'all-in-one-wp-migration-multisite-extension' );
}

// =============================
// = Multisite Extension About =
// =============================
if ( ! defined( 'S2SMME_PLUGIN_ABOUT' ) ) {
	define( 'S2SMME_PLUGIN_ABOUT', 'https://migzara.com/products/multisite-extension/about' );
}

// ===========================
// = Multisite Extension Key =
// ===========================
if ( ! defined( 'S2SMME_PLUGIN_KEY' ) ) {
	define( 'S2SMME_PLUGIN_KEY', 's2smme_plugin_key' );
}

// =============================
// = Multisite Extension Short =
// =============================
if ( ! defined( 'S2SMME_PLUGIN_SHORT' ) ) {
	define( 'S2SMME_PLUGIN_SHORT', 'multisite' );
}

// ================================
// = Unlimited Extension Base Dir =
// ================================
if ( defined( 'S2SMUE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMUE_PLUGIN_BASEDIR', dirname( S2SMUE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMUE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-unlimited-extension' );
}

// =============================
// = Unlimited Extension About =
// =============================
if ( ! defined( 'S2SMUE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMUE_PLUGIN_ABOUT', 'https://migzara.com/products/unlimited-extension/about' );
}

// ===========================
// = Unlimited Extension Key =
// ===========================
if ( ! defined( 'S2SMUE_PLUGIN_KEY' ) ) {
	define( 'S2SMUE_PLUGIN_KEY', 's2smue_plugin_key' );
}

// =============================
// = Unlimited Extension Short =
// =============================
if ( ! defined( 'S2SMUE_PLUGIN_SHORT' ) ) {
	define( 'S2SMUE_PLUGIN_SHORT', 'unlimited' );
}

// ==========================
// = FTP Extension Base Dir =
// ==========================
if ( defined( 'S2SMFE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMFE_PLUGIN_BASEDIR', dirname( S2SMFE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMFE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-ftp-extension' );
}

// =======================
// = FTP Extension About =
// =======================
if ( ! defined( 'S2SMFE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMFE_PLUGIN_ABOUT', 'https://migzara.com/products/ftp-extension/about' );
}

// =====================
// = FTP Extension Key =
// =====================
if ( ! defined( 'S2SMFE_PLUGIN_KEY' ) ) {
	define( 'S2SMFE_PLUGIN_KEY', 's2smfe_plugin_key' );
}

// =======================
// = FTP Extension Short =
// =======================
if ( ! defined( 'S2SMFE_PLUGIN_SHORT' ) ) {
	define( 'S2SMFE_PLUGIN_SHORT', 'ftp' );
}

// ==========================
// = URL Extension Base Dir =
// ==========================
if ( defined( 'S2SMLE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMLE_PLUGIN_BASEDIR', dirname( S2SMLE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMLE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-url-extension' );
}

// =======================
// = URL Extension About =
// =======================
if ( ! defined( 'S2SMLE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMLE_PLUGIN_ABOUT', 'https://migzara.com/products/url-extension/about' );
}

// =====================
// = URL Extension Key =
// =====================
if ( ! defined( 'S2SMLE_PLUGIN_KEY' ) ) {
	define( 'S2SMLE_PLUGIN_KEY', 's2smle_plugin_key' );
}

// =======================
// = URL Extension Short =
// =======================
if ( ! defined( 'S2SMLE_PLUGIN_SHORT' ) ) {
	define( 'S2SMLE_PLUGIN_SHORT', 'url' );
}

// ===============================
// = OneDrive Extension Base Dir =
// ===============================
if ( defined( 'S2SMOE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMOE_PLUGIN_BASEDIR', dirname( S2SMOE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMOE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-onedrive-extension' );
}

// ============================
// = OneDrive Extension About =
// ============================
if ( ! defined( 'S2SMOE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMOE_PLUGIN_ABOUT', 'https://migzara.com/products/onedrive-extension/about' );
}

// ==========================
// = OneDrive Extension Key =
// ==========================
if ( ! defined( 'S2SMOE_PLUGIN_KEY' ) ) {
	define( 'S2SMOE_PLUGIN_KEY', 's2smoe_plugin_key' );
}

// ============================
// = OneDrive Extension Short =
// ============================
if ( ! defined( 'S2SMOE_PLUGIN_SHORT' ) ) {
	define( 'S2SMOE_PLUGIN_SHORT', 'onedrive' );
}

// ==========================
// = Box Extension Base Dir =
// ==========================
if ( defined( 'S2SMBE_PLUGIN_BASENAME' ) ) {
	define( 'S2SMBE_PLUGIN_BASEDIR', dirname( S2SMBE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SMBE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-box-extension' );
}

// =======================
// = Box Extension About =
// =======================
if ( ! defined( 'S2SMBE_PLUGIN_ABOUT' ) ) {
	define( 'S2SMBE_PLUGIN_ABOUT', 'https://migzara.com/products/box-extension/about' );
}

// =====================
// = Box Extension Key =
// =====================
if ( ! defined( 'S2SMBE_PLUGIN_KEY' ) ) {
	define( 'S2SMBE_PLUGIN_KEY', 's2smbe_plugin_key' );
}

// =======================
// = Box Extension Short =
// =======================
if ( ! defined( 'S2SMBE_PLUGIN_SHORT' ) ) {
	define( 'S2SMBE_PLUGIN_SHORT', 'box' );
}
