<?php 

if ( ! defined( 'ABSPATH' ) ) exit;


/**
* HeroThemes REST API Widget
*/
class REST_API_Widget extends WP_Widget { 

	//set up widget 
	public function __construct() { 
		$widget_ops = array( 	'classname' => 'rest-api-widget',
 								'description' => 'A REST API widget that pulls posts from a different website'
 		);
 		parent::__construct( 'rest_api_widget', 'REST API Widget', $widget_ops );
 	}

	/**
	* Outputs the content of the widget
	*
	* @param array $args
	* @param array $instance
	*/
	public function widget( $args, $instance ) {
		//change this url to the WP-API endpoint for your site!
		$response = wp_remote_get( 'https://example.com/wp-json/wp/v2/ht-kb/' );

		if( is_wp_error( $response ) ) {
			return;
		}

		$posts = json_decode( wp_remote_retrieve_body( $response ) );

		if( empty( $posts ) ) {
			return;
		}

		echo $args['before_widget'];
		if( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
		}
		
		//main widget content
		if( !empty( $posts ) ) {
		
			echo '<ul>';
			foreach( $posts as $post ) {
			echo '<li><a href="' . $post->link. '">' . $post->title->rendered . '</a></li>';
			}
			echo '</ul>';
			
		}

		echo $args['after_widget'];
	}

	/**
	* Outputs the options form on admin
	*
	* @param array $instance The widget options
	*/
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
		?>

		<label for="<?php echo $this->get_field_name( 'title' ); ?>">Title: </label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
		  name="<?php echo $this->get_field_name( 'title' ); ?>" 
		  type="text" value="<?php echo esc_attr( $title ); ?>" />
		
		<?php 
	} 

 } 

 add_action( 'widgets_init', function(){ register_widget( 'REST_API_Widget' ); } ); 