
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
		//inline
		
		
		// TO CHECK WEATHER FORECAST OF ANY PLACE JUST CHANGE THE PLACE IDENTIFICATION CODE 
		echo '<iframe src="https://www.meteoblue.com/en/weather/widget/daily/place_identification_9874?geoloc=fixed&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&precipunit=MILLIMETER&coloured=coloured&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&winddirection=1&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&precipitationprobability=1&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 216px; height: 420px"></iframe>
			<div><a href="https://www.meteoblue.com/en/weather/week/place_identification?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank" rel="noopener"></a></div>';
		
		
		
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
		$place = ! empty( $instance['place'] ) ? $instance['place'] : esc_html__( 'Cyprus', 'weather_domain' );
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

		   <!--PLACE-->

		   <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'place' ) ); ?>"><?php esc_attr_e( 'Place:', 'weather_domain' ); ?></label> 
		<input 
         class="widefat" 
         id="<?php echo esc_attr( $this->get_field_id( 'place' ) ); ?>"
         name="<?php echo esc_attr( $this->get_field_name( 'place' ) ); ?>" 
         type="text"  
         value="<?php echo esc_attr( $place ); ?>">
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
		$instance['place'] = ( ! empty( $new_instance['place'] ) ) ? sanitize_text_field( $new_instance['place'] ) : '';

		return $instance;
	}

} // class weather_Widget
?>
