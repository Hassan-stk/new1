

<?php 
/**
 * Adds weather widget.
 */
class weather_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'weather_widget', // Base ID
			esc_html__( 'weather', 'weather_domain' ), // Name
			array( 'description' => esc_html__( 'Display weather Widget', 'weather_domain' ), ) // Args
		);
	}

	

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	
	 
	public function widget( $args, $instance ) {
		echo $args['before_widget']; //whatever u want to display before widget (<div>)
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

        // widget content output
		echo '<a class="weatherwidget-io" href="https://forecast7.com/en/35d1333d43/cyprus/" data-label_1="CYPRUS" data-label_2="WEATHER" data-theme="original" >CYPRUS WEATHER</a>';
		
		
		
		echo $args['after_widget']; //whatever u want to display after widget (<div>)
	}

		



		
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'weather update', 'weather_domain' );
		?>



		

<!-- </body> -->


        
        <!--TITLE-->

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'weather_domain' ); ?></label> 
		<input 
         class="widefat" 
         id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
         name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
         type="text" 
         value="<?php echo esc_attr( $title ); ?>">
		</p>



		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class weather_Widget
?>