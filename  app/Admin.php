<?php 

namespace Habib\App;

/**
 * Admin class
 */
class Admin{

    /**
     * Class constructor
     */
    public function __construct() {
        add_action( 'admin_enqueue_scripts', [$this, 'admin_enqueue'] );    
    }

    /**
     * load all admin assets
     */
    public function admin_enqueue() {
    
        wp_enqueue_style( 'admin-css', HABIB_ASSET . '/admin/css/admin.css', [], time(), 'all'  );
        wp_enqueue_script( 'admin-js', HABIB_ASSET . '/admin/js/admin.js', ['jquery'], time(), true );
    }

}