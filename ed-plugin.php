<?php

/**
 
 *@pachage edplugin 
 */

 /*
Plugin Name: Ed Plugin
Plugin URI : http://github.com/thegreated/
Description: This is my <b> first attempt </b> on plugin
Version: 1.0.0
Author: Edward Arilla
Author URI: http://#
License: GPLv2 or later
 */




defined('ABSPATH') or die('Hey cant access file');

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php'))
{
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH' , plugin_dir_path(__FILE__));
define('PLUGIN_URL' , plugin_dir_url(__FILE__));

if( class_exists('Inc\\Init')){
    Inc\Init::register_services();
}

