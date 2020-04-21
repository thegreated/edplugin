<?php

/**
 
 *@package edplugin 
 */

 
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController{

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register()
    {

        //add_action( 'admin_menu', array($this,'add_admin_pages') );
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings->addPages($this->pages)->withSubPage("Dashboard")->addSubPages($this->subpages)->register();
        //$this->settings->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'Ed Plugin', 
                'menu_title' => 'Ed', 
                'capability' => 'manage_options', 
                'menu_slug'  => 'ed_plugin',
                'callback'   =>  array($this->callbacks,'dashboard'),
                'icon_url'   => 'dashicons-store', 
                'position'   => 110
            ]
        ];

    }

    public function setSubpages()
    {

         
        $this->subpages = [
            [
                'parent_slug' => 'ed_plugin', 
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug'  => 'ed_cpt',
                'callback'   =>  array($this->callbacks,'customPostTypes'),
            ],
            [
                'parent_slug' => 'ed_plugin', 
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug'  => 'ed_taxonomies',
                'callback'   =>   array($this->callbacks,'taxonomies'),
            ],
            [
                'parent_slug' => 'ed_plugin', 
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug'  => 'ed_widgets',
                'callback'   =>  array($this->callbacks,'dashboard'),
            ]
        ];

    }

    public function setSettings()
    {
        $args = [
            [
                "option_group" => 'ed_options_group',
                'option_name' => 'text_example',
                'callback' => array( $this->callbacks,'edOptionsGroup')
            ],
            [
                "option_group" => 'ed_options_group',
                'option_name' => 'firstname',
             
            ],
        ];

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                "id" => 'ed_admin_index',
                'title' => 'Settings',
                'callback' => array( $this->callbacks,'edAdminSection'),
                'page' => 'ed_plugin'
            ],
        ];

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [
            [
                "id" => 'text_example',
                'title' => 'Test Example',
                'callback' => array( $this->callbacks,'edTextExample'),
                'page' => 'ed_plugin',
                'section' => 'ed_admin_index',
                'args' => [
                    'label_for' => 'text_example',
                    'class'     => 'example-class'
                ]
            ],
            [
                "id" => 'first_name',
                'title' => 'First Name',
                'callback' => array( $this->callbacks,'edFirstName'),
                'page' => 'ed_plugin',
                'section' => 'ed_admin_index',
                'args' => [
                    'label_for' => 'first_name',
                    'class'     => 'example-class'
                ]
            ],
        ];

        $this->settings->setFields($args);
    }


}