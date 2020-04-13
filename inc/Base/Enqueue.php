<?php

/**
 
 *@pachage edplugin 
 */

namespace Inc\Base;

class Enqueue{

  public function register(){
    add_action( 'admin_enqueue_scripts', array($this,'enqueue') );
  }
  
  function enqueue(){
    wp_enqueue_style( 'style', PLUGIN_URL. 'assets/css/style.css');
    wp_enqueue_script( 'custom', PLUGIN_URL. 'assets/js/custom.js');
  }

}



