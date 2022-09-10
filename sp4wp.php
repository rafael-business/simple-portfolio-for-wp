<?php

/**
 * Plugin Name: Simple Portfólio for WordPress
 * Plugin URI: https://wordpress.org/sp4wp
 * Description: Poste seus trabalhos recentes de uma maneira muito simples.
 * Version: 1.1.0
 * Requires at least: 5.6
 * Author: Rafael dos Santos
 * Author URI: https://rafael.work
 * Licence: GPL v2 or later
 * Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sp4wp
 * Domain Path: /languages
 */

/*
    Simple Portfólio for WordPress is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    Simple Portfólio for WordPress is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Simple Portfólio for WordPress. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ){
    exit;
}

if ( ! class_exists( 'SP4WP' ) ){

    class SP4WP{
        function __construct(){

            $this->define_constants();

            require_once( SP4WP_PATH . 'post-types/class.sp4wp-cpt.php' );
            $SP4WP_Post_Type = new SP4WP_Post_Type();
        }

        public function define_constants(){

            define( 'SP4WP_PATH', plugin_dir_path( __FILE__ ) );
            define( 'SP4WP_URL', plugin_dir_url( __FILE__ ) );
            define( 'SP4WP_VERSION', '1.1.0' );
        }

        public static function activate(){
            update_option( 'rewrite_rules', '' );
        }

        public static function deactivate(){
            
            flush_rewrite_rules();
            unregister_post_type( 'sp4wp' );
        }

        public static function uninstall(){
            
        }
    }
}

if ( class_exists( 'SP4WP' ) ){

    register_activation_hook( __FILE__, array( 'SP4WP', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'SP4WP', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'SP4WP', 'uninstall' ) );
    $SP4WP = new SP4WP();
}