<?php
/*
 * Plugin Name:       habib-boilerplate
 * Plugin URI:        
 * Description:       
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Habib
 * Author URI:        https://me.habibnote.com
 * Text Domain:       
*/

namespace Habib;

if( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Main Class
 */
final class Habib {
    static $instance = false;

    /**
     * Class Constructor
     */
    private function __construct() {

        $this->include();
        $this->define();
        $this->hooks();
    }

    /**
     * Include all needed files
     */
    private function include() {
        require_once( dirname( __FILE__ ) . '/inc/functions.php' );
        require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
    }

    /**
     * define all constant
     */
    private function define() {
        define( 'HABIB', __FILE__ );
        define( 'HABIB_DIR', dirname( HABIB ) );
        define( 'HABIB_ASSET', plugins_url( 'assets', HABIB ) );
    }

    /**
     * All hooks
     */
    private function hooks() {
        new App\Admin();
        new App\Front();
    }

    /**
     * Singleton Instance
    */
    static function get_habib_plugin() {
        
        if( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/**
 * Cick off the plugins 
 */
Habib::get_habib_plugin();
