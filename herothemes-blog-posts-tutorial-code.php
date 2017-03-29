<?php
/**
*   Plugin Name: HeroThemes Blog Post Tutorial Code
*   Plugin URI:  http://herothemes.com
*   Description: A repository for our code tutorials from the HeroThemes blog
*   Author: HeroThemes
*   Version: 0.1
*   Author URI: https://herothemes.com/
*   Text Domain: ht-bp-tutorial-code
*/

//exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'HT_Blog_Post_Tutorial_Code' ) ){

    class HT_Blog_Post_Tutorial_Code {

        /**
        * Constructor - Used when the plugin is initialized
        */
        function __construct(){
            

            //load tutorials
            include_once('tutorials/ht-bp-tutorials.php');
        }

        
    }

}

//Initialize the plugin
if( class_exists( 'HT_Blog_Post_Tutorial_Code' ) ){
    $HeroThemes_Blog_Post_Tutorial_Code_init = new HT_Blog_Post_Tutorial_Code();
}