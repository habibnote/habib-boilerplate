<?php 

namespace Habib\App;

/**
 * Admin class
 */
class Front{

    /**
     * Class constructor
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_script'] );    
    }

    /**
     * load all admin assets
     */
    public function enqueue_script() {
    
        //Only for front
        if( ! is_admin() ) {
            
            wp_enqueue_style( 'front-css', HABIB_ASSET . '/front/css/front.css', [], time(), 'all'  );
            wp_enqueue_script( 'front-js', HABIB_ASSET . '/front/js/front.js', ['jquery'], time(), true );

            $ajax_url = admin_url( 'admin-ajax.php' );
            wp_localize_script( 'front-js', 'HABIB', array( 'ajax' => $ajax_url ) );
        }
    }

}