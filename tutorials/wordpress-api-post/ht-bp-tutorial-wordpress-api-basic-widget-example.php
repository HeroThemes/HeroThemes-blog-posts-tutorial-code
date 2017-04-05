<?php

if ( ! defined( 'ABSPATH' ) ) exit;


/**
* HeroThemes Example Widget
*/
class My_Widget extends WP_Widget { 

    //set up widget
    public function __construct() { 

        $widget_ops = array( 
                        'classname' => 'rest-api-test-widget',
                        'description' => 'This example provides a framework for how we will build our widget'
        );

        parent::__construct( 'my_widget', 'My Widget', $widget_ops );
    }


    /**
     * Outputs the content of the widget
     * @param array $args
     * @param array $instance
     */

    public function widget( $args, $instance ) {
        //outputs the content of the widget
        echo $args['before_widget'];

        if( !empty( $instance['title'] ) ) {
          echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];

        }

        // Main Widget Content Goes Here

        echo $args['after_widget'];
    }


    /**
     * Outputs the options form on admin
     * @param array $instance The widget options
     */

    public function form( $instance ) {
        //outputs the options form on admin
        $title = ( !empty( $instance['title'] ) ) ? $instance['title'] : ''; ?>

        <label for="<?php echo $this->get_field_name( 'title' ); ?>">Title: </label>

        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
        name="<?php echo $this->get_field_name( 'title' ); ?>" 
        type="text" value="<?php echo esc_attr( $title ); ?>" />
    
        <?php 
    } 

} 

 add_action( 'widgets_init', function(){ register_widget( 'My_Widget' ); } ); 