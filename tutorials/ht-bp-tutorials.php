<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'HT_Blog_Post_Tutorials' ) ){

    class HT_Blog_Post_Tutorials {

        /**
        * Constructor - Used when the plugin is initialized
        */
        function __construct(){
            

            //load tutorials
            //WordPress API
            include_once('wordpress-api-post/ht-bp-tutorial-wordpress-api-basic-widget-example.php');
            include_once('wordpress-api-post/ht-bp-tutorial-wordpress-api-completed-widget-example.php');

            //membership
            include_once('wordpress-members-restriction-post/ht-bp-tutorial-wordpress-add-private-post-view-cap-to-subscribers.php');


        }

        
    }

}

//Initialize the plugin
if( class_exists( 'HT_Blog_Post_Tutorials' ) ){
    $HeroThemes_Blog_Post_Tutorial_Code_init = new HT_Blog_Post_Tutorials();
}