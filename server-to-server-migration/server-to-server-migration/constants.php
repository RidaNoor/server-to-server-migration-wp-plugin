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

// ================
// = Plugin Debug =
// ================
define( 'S2SM
_DEBUG', false );

// ==================
// = Plugin Version =
// ==================
define( 'S2SM
_VERSION', '6.40' );

// ===============
// = Plugin Name =
// ===============
define( 'S2SM
_PLUGIN_NAME', 'all-in-one-wp-migration' );

// ===================
// = Directory Index =
// ===================
define( 'S2SM
_DIRECTORY_INDEX', 'index.php' );

// ================
// = Storage Path =
// ================
define( 'S2SM
_STORAGE_PATH', S2SM
_PATH . DIRECTORY_SEPARATOR . 'storage' );

// ==================
// = Error Log Path =
// ==================
define( 'S2SM
_ERROR_FILE', S2SM
_STORAGE_PATH . DIRECTORY_SEPARATOR . 'error.log' );

// ===============
// = Status Path =
// ===============
define( 'S2SM
_STATUS_FILE', S2SM
_STORAGE_PATH . DIRECTORY_SEPARATOR . 'status.js' );

// ============
// = Lib Path =
// ============
define( 'S2SM
_LIB_PATH', S2SM
_PATH . DIRECTORY_SEPARATOR . 'lib' );

// ===================
// = Controller Path =
// ===================
define( 'S2SM
_CONTROLLER_PATH', S2SM
_LIB_PATH . DIRECTORY_SEPARATOR . 'controller' );

// ==============
// = Model Path =
// ==============
define( 'S2SM
_MODEL_PATH', S2SM
_LIB_PATH . DIRECTORY_SEPARATOR . 'model' );

// ===============
// = Export Path =
// ===============
define( 'S2SM
_EXPORT_PATH', S2SM
_MODEL_PATH . DIRECTORY_SEPARATOR . 'export' );

// ===============
// = Import Path =
// ===============
define( 'S2SM
_IMPORT_PATH', S2SM
_MODEL_PATH . DIRECTORY_SEPARATOR . 'import' );

// =============
// = Http Path =
// =============
define( 'S2SM
_HTTP_PATH', S2SM
_MODEL_PATH . DIRECTORY_SEPARATOR . 'http' );

// =============
// = View Path =
// =============
define( 'S2SM
_TEMPLATES_PATH', S2SM
_LIB_PATH . DIRECTORY_SEPARATOR . 'view' );

// ===================
// = Set Bandar Path =
// ===================
define( 'BANDAR_TEMPLATES_PATH', S2SM
_TEMPLATES_PATH );

// ===============
// = Vendor Path =
// ===============
define( 'S2SM
_VENDOR_PATH', S2SM
_LIB_PATH . DIRECTORY_SEPARATOR . 'vendor' );

// =========================
// = ServMask Feedback Url =
// =========================
define( 'S2SM
_FEEDBACK_URL', 'https://migzara.com/s2sm
/feedback/create' );

// =======================
// = ServMask Report Url =
// =======================
define( 'S2SM
_REPORT_URL', 'https://migzara.com/s2sm
/report/create' );

// ==============================
// = ServMask Archive Tools Url =
// ==============================
define( 'S2SM
_ARCHIVE_TOOLS_URL', 'https://migzara.com/archive/tools' );

// =========================
// = ServMask Table Prefix =
// =========================
define( 'S2SM
_TABLE_PREFIX', 'SERVMASK_PREFIX_' );

// ========================
// = Archive Backups Name =
// ========================
define( 'S2SM
_BACKUPS_NAME', 's2sm
-backups' );

// =========================
// = Archive Database Name =
// =========================
define( 'S2SM
_DATABASE_NAME', 'database.sql' );

// ========================
// = Archive Package Name =
// ========================
define( 'S2SM
_PACKAGE_NAME', 'package.json' );

// ==========================
// = Archive Multisite Name =
// ==========================
define( 'S2SM
_MULTISITE_NAME', 'multisite.json' );

// ======================
// = Archive Blogs Name =
// ======================
define( 'S2SM
_BLOGS_NAME', 'blogs.json' );

// ========================
// = Archive FileMap Name =
// ========================
define( 'S2SM
_FILEMAP_NAME', 'filemap.list' );

// =================================
// = Archive Must-Use Plugins Name =
// =================================
define( 'S2SM
_MUPLUGINS_NAME', 'mu-plugins' );

// ===================
// = Export Log Name =
// ===================
define( 'S2SM
_EXPORT_NAME', 'export.log' );

// ===================
// = Import Log Name =
// ===================
define( 'S2SM
_IMPORT_NAME', 'import.log' );

// ==================
// = Error Log Name =
// ==================
define( 'S2SM
_ERROR_NAME', 'error.log' );

// ==========
// = URL IP =
// ==========
define( 'S2SM
_URL_IP', 's2sm
_url_ip' );

// ===============
// = URL Adapter =
// ===============
define( 'S2SM
_URL_ADAPTER', 's2sm
_url_adapter' );

// ==============
// = Secret Key =
// ==============
define( 'S2SM
_SECRET_KEY', 's2sm
_secret_key' );

// =============
// = Auth User =
// =============
define( 'S2SM
_AUTH_USER', 's2sm
_auth_user' );

// =================
// = Auth Password =
// =================
define( 'S2SM
_AUTH_PASSWORD', 's2sm
_auth_password' );

// ==================
// = Active Plugins =
// ==================
define( 'S2SM
_ACTIVE_PLUGINS', 'active_plugins' );

// ===========================
// = Active Sitewide Plugins =
// ===========================
define( 'S2SM
_ACTIVE_SITEWIDE_PLUGINS', 'active_sitewide_plugins' );

// ======================
// = MS Files Rewriting =
// ======================
define( 'S2SM
_MS_FILES_REWRITING', 'ms_files_rewriting' );

// ===============
// = Updater Key =
// ===============
define( 'S2SM
_UPDATER', 's2sm
_updater' );

// ==============
// = Status Key =
// ==============
define( 'S2SM
_STATUS', 's2sm
_status' );

// =================
// = Support Email =
// =================
define( 'S2SM
_SUPPORT_EMAIL', 'support@migzara.com' );

// =================
// = Max File Size =
// =================
define( 'S2SM
_MAX_FILE_SIZE', 536870912 );

// ==================
// = Max Chunk Size =
// ==================
define( 'S2SM
_MAX_CHUNK_SIZE', 5242880 );

// =====================
// = Max Chunk Retries =
// =====================
define( 'S2SM
_MAX_CHUNK_RETRIES', 10 );

// ===========================
// = WP_CONTENT_DIR Constant =
// ===========================
if ( ! defined( 'WP_CONTENT_DIR' ) ) {
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
}

// ================
// = Uploads Path =
// ================
define( 'S2SM
_UPLOADS_PATH', 'uploads' );

// ==============
// = Blogs Path =
// ==============
define( 'S2SM
_BLOGSDIR_PATH', 'blogs.dir' );

// ==============
// = Sites Path =
// ==============
define( 'S2SM
_SITES_PATH', S2SM
_UPLOADS_PATH . DIRECTORY_SEPARATOR . 'sites' );

// ================
// = Backups Path =
// ================
define( 'S2SM
_BACKUPS_PATH', WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 's2sm
-backups' );

// ======================
// = Storage Index File =
// ======================
define( 'S2SM
_STORAGE_INDEX', S2SM
_STORAGE_PATH . DIRECTORY_SEPARATOR . 'index.php' );

// ======================
// = Backups Index File =
// ======================
define( 'S2SM
_BACKUPS_INDEX', S2SM
_BACKUPS_PATH . DIRECTORY_SEPARATOR . 'index.php' );

// =========================
// = Backups Htaccess File =
// =========================
define( 'S2SM
_BACKUPS_HTACCESS', S2SM
_BACKUPS_PATH . DIRECTORY_SEPARATOR . '.htaccess' );

// ==========================
// = Backups Webconfig File =
// ==========================
define( 'S2SM
_BACKUPS_WEBCONFIG', S2SM
_BACKUPS_PATH . DIRECTORY_SEPARATOR . 'web.config' );

// ================================
// = WP Migration Plugin Base Dir =
// ================================
if ( defined( 'S2SM
_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
_PLUGIN_BASEDIR', dirname( S2SM
_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
_PLUGIN_BASEDIR', 'all-in-one-wp-migration' );
}

// ==============================
// = Dropbox Extension Base Dir =
// ==============================
if ( defined( 'S2SM
DE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
DE_PLUGIN_BASEDIR', dirname( S2SM
DE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
DE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-dropbox-extension' );
}

// ===========================
// = Dropbox Extension About =
// ===========================
if ( ! defined( 'S2SM
DE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
DE_PLUGIN_ABOUT', 'https://migzara.com/products/dropbox-extension/about' );
}

// =========================
// = Dropbox Extension Key =
// =========================
if ( ! defined( 'S2SM
DE_PLUGIN_KEY' ) ) {
	define( 'S2SM
DE_PLUGIN_KEY', 's2sm
de_plugin_key' );
}

// ===========================
// = Dropbox Extension Short =
// ===========================
if ( ! defined( 'S2SM
DE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
DE_PLUGIN_SHORT', 'dropbox' );
}

// ===================================
// = Google Drive Extension Base Dir =
// ===================================
if ( defined( 'S2SM
GE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
GE_PLUGIN_BASEDIR', dirname( S2SM
GE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
GE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-gdrive-extension' );
}

// ================================
// = Google Drive Extension About =
// ================================
if ( ! defined( 'S2SM
GE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
GE_PLUGIN_ABOUT', 'https://migzara.com/products/google-drive-extension/about' );
}

// ==============================
// = Google Drive Extension Key =
// ==============================
if ( ! defined( 'S2SM
GE_PLUGIN_KEY' ) ) {
	define( 'S2SM
GE_PLUGIN_KEY', 's2sm
ge_plugin_key' );
}

// ================================
// = Google Drive Extension Short =
// ================================
if ( ! defined( 'S2SM
GE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
GE_PLUGIN_SHORT', 'gdrive' );
}

// ================================
// = Amazon S3 Extension Base Dir =
// ================================
if ( defined( 'S2SM
SE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
SE_PLUGIN_BASEDIR', dirname( S2SM
SE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
SE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-s3-extension' );
}

// =============================
// = Amazon S3 Extension About =
// =============================
if ( ! defined( 'S2SM
SE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
SE_PLUGIN_ABOUT', 'https://migzara.com/products/amazon-s3-extension/about' );
}

// ===========================
// = Amazon S3 Extension Key =
// ===========================
if ( ! defined( 'S2SM
SE_PLUGIN_KEY' ) ) {
	define( 'S2SM
SE_PLUGIN_KEY', 's2sm
se_plugin_key' );
}

// =============================
// = Amazon S3 Extension Short =
// =============================
if ( ! defined( 'S2SM
SE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
SE_PLUGIN_SHORT', 's3' );
}

// ================================
// = Multisite Extension Base Dir =
// ================================
if ( defined( 'S2SM
ME_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
ME_PLUGIN_BASEDIR', dirname( S2SM
ME_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
ME_PLUGIN_BASEDIR', 'all-in-one-wp-migration-multisite-extension' );
}

// =============================
// = Multisite Extension About =
// =============================
if ( ! defined( 'S2SM
ME_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
ME_PLUGIN_ABOUT', 'https://migzara.com/products/multisite-extension/about' );
}

// ===========================
// = Multisite Extension Key =
// ===========================
if ( ! defined( 'S2SM
ME_PLUGIN_KEY' ) ) {
	define( 'S2SM
ME_PLUGIN_KEY', 's2sm
me_plugin_key' );
}

// =============================
// = Multisite Extension Short =
// =============================
if ( ! defined( 'S2SM
ME_PLUGIN_SHORT' ) ) {
	define( 'S2SM
ME_PLUGIN_SHORT', 'multisite' );
}

// ================================
// = Unlimited Extension Base Dir =
// ================================
if ( defined( 'S2SM
UE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
UE_PLUGIN_BASEDIR', dirname( S2SM
UE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
UE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-unlimited-extension' );
}

// =============================
// = Unlimited Extension About =
// =============================
if ( ! defined( 'S2SM
UE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
UE_PLUGIN_ABOUT', 'https://migzara.com/products/unlimited-extension/about' );
}

// ===========================
// = Unlimited Extension Key =
// ===========================
if ( ! defined( 'S2SM
UE_PLUGIN_KEY' ) ) {
	define( 'S2SM
UE_PLUGIN_KEY', 's2sm
ue_plugin_key' );
}

// =============================
// = Unlimited Extension Short =
// =============================
if ( ! defined( 'S2SM
UE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
UE_PLUGIN_SHORT', 'unlimited' );
}

// ==========================
// = FTP Extension Base Dir =
// ==========================
if ( defined( 'S2SM
FE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
FE_PLUGIN_BASEDIR', dirname( S2SM
FE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
FE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-ftp-extension' );
}

// =======================
// = FTP Extension About =
// =======================
if ( ! defined( 'S2SM
FE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
FE_PLUGIN_ABOUT', 'https://migzara.com/products/ftp-extension/about' );
}

// =====================
// = FTP Extension Key =
// =====================
if ( ! defined( 'S2SM
FE_PLUGIN_KEY' ) ) {
	define( 'S2SM
FE_PLUGIN_KEY', 's2sm
fe_plugin_key' );
}

// =======================
// = FTP Extension Short =
// =======================
if ( ! defined( 'S2SM
FE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
FE_PLUGIN_SHORT', 'ftp' );
}

// ==========================
// = URL Extension Base Dir =
// ==========================
if ( defined( 'S2SM
LE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
LE_PLUGIN_BASEDIR', dirname( S2SM
LE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
LE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-url-extension' );
}

// =======================
// = URL Extension About =
// =======================
if ( ! defined( 'S2SM
LE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
LE_PLUGIN_ABOUT', 'https://migzara.com/products/url-extension/about' );
}

// =====================
// = URL Extension Key =
// =====================
if ( ! defined( 'S2SM
LE_PLUGIN_KEY' ) ) {
	define( 'S2SM
LE_PLUGIN_KEY', 's2sm
le_plugin_key' );
}

// =======================
// = URL Extension Short =
// =======================
if ( ! defined( 'S2SM
LE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
LE_PLUGIN_SHORT', 'url' );
}

// ===============================
// = OneDrive Extension Base Dir =
// ===============================
if ( defined( 'S2SM
OE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
OE_PLUGIN_BASEDIR', dirname( S2SM
OE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
OE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-onedrive-extension' );
}

// ============================
// = OneDrive Extension About =
// ============================
if ( ! defined( 'S2SM
OE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
OE_PLUGIN_ABOUT', 'https://migzara.com/products/onedrive-extension/about' );
}

// ==========================
// = OneDrive Extension Key =
// ==========================
if ( ! defined( 'S2SM
OE_PLUGIN_KEY' ) ) {
	define( 'S2SM
OE_PLUGIN_KEY', 's2sm
oe_plugin_key' );
}

// ============================
// = OneDrive Extension Short =
// ============================
if ( ! defined( 'S2SM
OE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
OE_PLUGIN_SHORT', 'onedrive' );
}

// ==========================
// = Box Extension Base Dir =
// ==========================
if ( defined( 'S2SM
BE_PLUGIN_BASENAME' ) ) {
	define( 'S2SM
BE_PLUGIN_BASEDIR', dirname( S2SM
BE_PLUGIN_BASENAME ) );
} else {
	define( 'S2SM
BE_PLUGIN_BASEDIR', 'all-in-one-wp-migration-box-extension' );
}

// =======================
// = Box Extension About =
// =======================
if ( ! defined( 'S2SM
BE_PLUGIN_ABOUT' ) ) {
	define( 'S2SM
BE_PLUGIN_ABOUT', 'https://migzara.com/products/box-extension/about' );
}

// =====================
// = Box Extension Key =
// =====================
if ( ! defined( 'S2SM
BE_PLUGIN_KEY' ) ) {
	define( 'S2SM
BE_PLUGIN_KEY', 's2sm
be_plugin_key' );
}

// =======================
// = Box Extension Short =
// =======================
if ( ! defined( 'S2SM
BE_PLUGIN_SHORT' ) ) {
	define( 'S2SM
BE_PLUGIN_SHORT', 'box' );
}
