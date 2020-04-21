<?php

/**
 
 *@package edplugin 
 */

namespace Inc\Base;


use \Inc\Base\BaseController;

class Enqueue extends BaseController
{

  public function register(){
    add_action( 'admin_enqueue_scripts', array($this,'enqueue') );
  }
  
  function enqueue(){
    echo $this->plugin ;
    wp_enqueue_style( 'style', $this->plugin_url . '/assets/css/style.css');
    wp_enqueue_script( 'custom', $this->plugin_url. '/assets/js/custom.js');
  }

}



