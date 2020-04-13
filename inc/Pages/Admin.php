<?php

/**
 
 *@pachage edplugin 
 */

namespace Inc\Pages;

class Admin{


    function __constructor(){

    }

    public function register()
    {

        add_action( 'admin_menu', array($this,'add_admin_pages') );
    }


    function add_admin_pages()
    {
        add_menu_page('Ed Plugin', 'Ed', 'manage_options', 'ed_plugin',
         array($this,'admin_index'),'dashicons-store', 110);
    }

    function admin_index()
    {
        require_once PLUGIN_PATH. '/templates/admin.php';

    }

}