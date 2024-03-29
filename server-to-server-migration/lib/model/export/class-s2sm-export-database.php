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
_Export_Database {

	public static function execute( $params ) {
		global $wpdb;

		// Set exclude database
		if ( isset( $params['options']['no_database'] ) ) {
			return $params;
		}

		// Set progress
		S2sm
_Status::info( __( 'Exporting database...', S2SM_PLUGIN_NAME ) );

		// Get database client
		if ( empty( $wpdb->use_mysqli ) ) {
			$client = new S2sm
_Database_Mysql( $wpdb );
		} else {
			$client = new S2sm
_Database_Mysqli( $wpdb );
		}

		// Spam comments
		if ( isset( $params['options']['no_spam_comments'] ) ) {
			$client->set_table_query_clauses( s2sm
_table_prefix() . 'comments', " WHERE comment_approved != 'spam' " );
			$client->set_table_query_clauses( s2sm
_table_prefix() . 'commentmeta', sprintf(
				" WHERE comment_id IN ( SELECT comment_ID FROM `%s` WHERE comment_approved != 'spam' ) ",
				s2sm
_table_prefix() . 'comments'
			) );
		}

		// Post revisions
		if ( isset( $params['options']['no_revisions'] ) ) {
			$client->set_table_query_clauses( s2sm
_table_prefix() . 'posts', " WHERE post_type != 'revision' " );
		}

		$old_table_values = array();
		$new_table_values = array();

		// Find and replace
		if ( isset( $params['options']['replace'] ) && ( $replace = $params['options']['replace'] ) ) {
			for ( $i = 0; $i < count( $replace['old_value'] ); $i++ ) {
				if ( ! empty( $replace['old_value'][ $i ] ) && ! empty( $replace['new_value'][ $i ] ) ) {
					$old_table_values[] = $replace['old_value'][ $i ];
					$new_table_values[] = $replace['new_value'][ $i ];
				}
			}
		}

		$old_table_prefixes = array();
		$new_table_prefixes = array();

		// Set table prefixes
		if ( s2sm
_table_prefix() ) {
			$old_table_prefixes[] = s2sm
_table_prefix();
			$new_table_prefixes[] = s2sm
_servmask_prefix();
		} else {
			// Set table prefixes based on table name
			foreach ( $client->get_tables() as $table_name ) {
				$old_table_prefixes[] = $table_name;
				$new_table_prefixes[] = s2sm
_servmask_prefix() . $table_name;
			}

			// Set table prefixes based on user meta
			foreach ( array( 'capabilities', 'user_level', 'user_roles' ) as $user_meta ) {
				$old_table_prefixes[] = $user_meta;
				$new_table_prefixes[] = s2sm
_servmask_prefix() . $user_meta;
			}
		}

		$include_table_prefixes = array();

		// Include table prefixes
		if ( s2sm
_table_prefix() ) {
			$include_table_prefixes[] = s2sm
_table_prefix();
		} else {
			foreach ( $client->get_tables() as $table_name ) {
				$include_table_prefixes[] = $table_name;
			}
		}

		// Set database options
		$client->set_old_table_prefixes( $old_table_prefixes )
			   ->set_new_table_prefixes( $new_table_prefixes )
			   ->set_old_replace_values( $old_table_values )
			   ->set_new_replace_values( $new_table_values )
			   ->set_include_table_prefixes( $include_table_prefixes )
			   ->set_table_prefix_columns( s2sm
_table_prefix() . 'options', array( 'option_name' ) )
			   ->set_table_prefix_columns( s2sm
_table_prefix() . 'usermeta', array( 'meta_key' ) );

		// Exclude active plugins and status options
		$client->set_table_query_clauses( s2sm
_table_prefix() . 'options', sprintf( " WHERE option_name NOT IN ('%s', '%s') ", S2SM_ACTIVE_PLUGINS, S2SM_STATUS ) );

		// Set current table index
		if ( isset( $params['current_table_index'] ) ) {
			$current_table_index = (int) $params['current_table_index'];
		} else {
			$current_table_index = 0;
		}

		// Export database
		if ( $client->export( s2sm
_database_path( $params ), $current_table_index, 10 ) ) {

			// Get archive file
			$archive = new S2sm
_Compressor( s2sm
_archive_path( $params ) );

			// Add database to archive
			$archive->add_file( s2sm
_database_path( $params ), S2SM_DATABASE_NAME );
			$archive->close();

			// Set progress
			S2sm
_Status::info( __( 'Done exporting database.', S2SM_PLUGIN_NAME ) );

			// Unset current table index
			unset( $params['current_table_index'] );

			// Unset completed flag
			unset( $params['completed'] );

		} else {

			// Set current table index
			$params['current_table_index'] = $current_table_index;

			// Set completed flag
			$params['completed'] = false;

		}

		return $params;
	}
}
