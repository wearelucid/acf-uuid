<?php

/*
Plugin Name: Advanced Custom Fields: UUID
Plugin URI: https://github.com/cjke/acf-uuid
Description:
Version: 0.0.1
Author: cjke
Author URI: https://github.com/cjke
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_uuid') ) :

class acf_plugin_uuid {

    /*
    *  __construct
    *
    *  This function will setup the class functionality
    *
    *  @type    function
    *  @date    20/12/2016
    *  @since   1.0.0
    *
    *  @param   n/a
    *  @return  n/a
    */

    function __construct() {

        // vars
        $this->settings = array(
            'version'   => '1.0.0',
            'url'       => plugin_dir_url( __FILE__ ),
            'path'      => plugin_dir_path( __FILE__ )
        );


        // set text domain
        // https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
        load_plugin_textdomain( 'acf-uuid', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );


        // include field
        add_action('acf/include_field_types',   array($this, 'include_field_types')); // v5
        add_action('acf/register_fields',       array($this, 'include_field_types')); // v4

    }


    /*
    *  include_field_types
    *
    *  This function will include the field type class
    *
    *  @type    function
    *  @date    20/12/2016
    *  @since   1.0.0
    *
    *  @param   $version (int) major ACF version. Defaults to false
    *  @return  n/a
    */

    function include_field_types() {
        include_once('fields/acf-uuid.php');
    }

}


// initialize
new acf_plugin_uuid();


// class_exists check
endif;

?>