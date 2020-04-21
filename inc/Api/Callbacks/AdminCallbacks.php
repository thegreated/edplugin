<?php

/**
 
 *@package edplugin 
 */

 
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController 
{



    public function dashboard()
    {
        return require_once( $this->plugin_path . "/templates/admin/dashboard.php"); 
    }

    public function customPostTypes()
    {
        return require_once( $this->plugin_path . "/templates/admin/cpt.php"); 
    }
    public function taxonomies()
    {
        return require_once( $this->plugin_path . "/templates/admin/taxonomy.php"); 
    }
    public function widgets()
    {
        return require_once( $this->plugin_path . "/templates/admin/widget.php"); 
    }
    public function edOptionsGroup($input)
    {
        return $input;
    }
    public function edAdminSection()
    {
        echo 'Check this section';
    }

    public function edTextExample()
    {
        $value = esc_attr( get_option( 'text_example' ));
        echo '<input type="text" class="regular-text" name="text_example" 
                value="'. $value .'" 
                 placeholder="Write somethig here" /> ';
    }

    public function  edFirstName()
    {
        $value = esc_attr( get_option( 'first_name' ));
        echo '<input type="text" class="regular-text" name="first_name" 
                value="'. $value .'" 
                 placeholder="Firstname" /> ';
    }

}