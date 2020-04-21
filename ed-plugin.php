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



// if this file is called directly, abort!
defined('ABSPATH') or die('Hey cant access file');


//for composer to load
if(file_exists(dirname(__FILE__) . '/vendor/autoload.php'))
{
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//list of constant variable


// activate plugin
function activate_ed_plugin()
{
    Inc\Base\Activate::activate();
}
//deactivate plugin
function deactivate_ed_plugin()
{
    Inc\Base\Deactivate::deactivate();
}

//register activate and deactivate
register_activation_hook( __FILE__, 'activate_ed_plugin');
register_deactivation_hook( __FILE__, 'deactivate_ed_plugin');


if( class_exists('Inc\\Init'))
{
    Inc\Init::register_services();
}

