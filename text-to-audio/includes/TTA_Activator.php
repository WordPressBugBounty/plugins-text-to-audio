<?php

namespace TTA;

/**
 * Fired during plugin activation
 *
 * @link       http://azizulhasan.com
 * @since      1.0.0
 *
 * @package    TTA
 * @subpackage TTA/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    TTA
 * @subpackage TTA/includes
 * @author     Azizul Hasan <azizulhasan.cr@gmail.com>
 */
class TTA_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate( $renew_all_settings = false ) {
		/**
		 * Customization settings.
		 */
		if ( $renew_all_settings || ! get_option( 'tta_customize_settings' ) ) {
			update_option( 'tta_customize_settings', array
			(
				"backgroundColor"        => "#184c53",
				"color"                  => "#ffffff",
				"width"                  => "100",
				'custom_css'             => '',
				'tta_play_btn_shortcode' => '[atlasvoice]',
				'buttonSettings'         => [
					'id'                         => 1,
					'button_position'            => 'before_content',
					'display_player_to'          => [ 'all' ],
					'who_can_download_mp3_file'  => [ 'all' ],
					'generate_mp3_date_from' => '',
					'generate_mp3_date_to'   => ''
				],
				'height'                 => '30',
				'border'                 => '#00000',
				'border_color'           => '0',
				'fontSize'               => '18',
				'borderRadius'           => '4',
                'marginTop'              => '0',
                'marginBottom'           => '0',
                'marginLeft'             => '0',
                'marginRight'            => '0',
			) );

		}

		/**
		 * Text To Audio settings.
		 */
		if ( $renew_all_settings || ! get_option( 'tta_settings_data' ) ) {
			update_option( 'tta_settings_data', array
			(
				'tta__settings_enable_button_add'                     => true,
				'tta__settings_apply_number_format'                   => false,
				"tta__settings_allow_listening_for_post_types"        => [ 'post' ],
				"tta__settings_allow_listening_for_posts_status"      => [ 'publish' ],
				'tta__settings_css_selectors'                         => '',
				'tta__settings_exclude_content_by_css_selectors'      => '',
				'tta__settings_exclude_texts'                         => [],
				'tta__settings_exclude_tags'                          => [],
				"tta__settings_display_btn_icon"                      => true,
				"tta__settings_exclude_post_ids"                      => [],
				'tta__settings_stop_auto_playing_after_switching_tab' => true,
				'tta__settings_stop_floating_button'                  => true,
				'tta__settings_exclude_categories'                    => [],
				'tta__settings_exclude_wp_tags'                       => [],
				'tta__settings_clear_cache'                           => [],
				'tta__settings_clear_all_cache'                       => true,
				'tta__settings_add_post_title_to_read'                => true,
				'tta__settings_add_post_excerpt_to_read'              => false,
				'tta__settings_text_after_content'					  => '',
				'tta__settings_text_before_content'					  => '',
			) );
		}


		/**
		 * Listening settings.
		 */
		if ( $renew_all_settings || ! get_option( 'tta_listening_settings' ) ) {
			update_option( 'tta_listening_settings', array
			(
				"tta__listening_voice"  => "Microsoft Zira - English (United States)",
				"tta__listening_pitch"  => 1,
				"tta__listening_rate"   => 1,
				"tta__listening_volume" => 1,
				"tta__listening_lang"   => "en-US",
			) );
		}


		/**
		 * Recording settings.
		 */
		if ( $renew_all_settings || ! get_option( 'tta_record_settings' ) ) {
			update_option( 'tta_record_settings', array
			(
				"is_record_continously"   => true,
				"tta__recording__lang"    => "en-US",
				"tta__sentence_delimiter" => ".",
			) );
		}


		// Button listen text.
		$listen_text = __( "Listen", 'text-to-audio' );
		$pause_text  = __( 'Pause', 'text-to-audio' );
		$resume_text = __( 'Resume', 'text-to-audio' );
		$replay_text = __( 'Replay', 'text-to-audio' );
		$start_text  = __( 'Start', 'text-to-audio' );
		$stop_text   = __( 'Stop', 'text-to-audio' );

		if ( $renew_all_settings || ! get_option( 'tta__button_text_arr' ) ) {
			update_option( 'tta__button_text_arr', [
				'listen_text' => $listen_text,
				'pause_text'  => $pause_text,
				'resume_text' => $resume_text,
				'replay_text' => $replay_text,
				'start_text'  => $start_text,
				'stop_text'   => $stop_text,
			] );
		}

//		if ( get_transient( 'tts_all_settings' ) ) {
//			\TTA_Cache::delete( 'all_settings' );
//		}

		/**
		 * analytics settings.
		 */
		if ( $renew_all_settings || ! get_option( 'tta_analytics_settings' ) ) {
			update_option( 'tta_analytics_settings', array
			(
				"tts_enable_analytics"   => false,
				"tts_trackable_post_ids" => []
			) );
		}

		self::create_analytics_table_if_not_exists();
	}


	public static function create_analytics_table_if_not_exists() {

		if ( ! self::is_table_exists() ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'atlasvoice_analytics';

			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE $table_name (
	        id mediumint(9) NOT NULL AUTO_INCREMENT,
	        user_id VARCHAR(50) NOT NULL,
	        post_id bigint(20) NOT NULL,
	        analytics longtext NOT NULL,
	        other_data longtext DEFAULT NULL,
	        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
	        updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
	        UNIQUE KEY id (id)
	    ) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
			update_option( 'atlasvoice_analytics_table_is_created', true );
		}

	}

	private static function is_table_exists() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'atlasvoice_analytics';
		$query      = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

		if ( ! $wpdb->get_var( $query ) == $table_name ) {
			return false;
		}

		return true;
	}


}
