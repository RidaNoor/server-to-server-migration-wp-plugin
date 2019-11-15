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
_Export_Download {

	public static function execute( $params ) {

		// Set progress
		S2sm
_Status::info( __( 'Renaming exported file...', S2SM_PLUGIN_NAME ) );

		// Close achive file
		$archive = new S2sm
_Compressor( s2sm
_archive_path( $params ) );

		// Append EOF block
		$archive->close( true );

		// Rename archive file
		if ( rename( s2sm
_archive_path( $params ), s2sm
_download_path( $params ) ) ) {

			// Set archive details
			$link = s2sm
_backups_url( $params );
			$size = s2sm
_download_size( $params );
			$name = s2sm
_site_name();

			$html = "<a href=\"{$link}\" class=\"s2sm
-button-green\">".
				"<span>Download Backup</span>".
				"<em>Size: {$size}</em>".
				"</a>".
				"<a href=\"#\" onclick=\"copyToClipboard('{$link}');\" class=\"s2sm
-button-green\">".
				"<span>Get URL</span>".
				"</a>";

			// Set progress
			S2sm
_Status::download(
			__( $html,S2SM_PLUGIN_NAME)
			);
		}

		return $params;
	}
}
/*sprintf(
                __(
                    '<a href="%s" class="s2sm
-button-green">' .
                    '<span>Download %s</span>' .
                    '<em>Size: %s</em>' .
                    '</a>',
                    S2SM_PLUGIN_NAME
                ),
                $link,
                $name,
                $size
            )*/