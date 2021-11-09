<?php 
/**
 * new WordPress Widget format
 * Wordpress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class Parallel_Service_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
      $widget_ops = array( 'classname' => 'wcp_image', 'description' => __('Add a service to the homepage services section.', 'parallel') );
      parent::__construct( 'Parallel_service', __('Parallel - Service Widget', 'parallel'), $widget_ops );
      
      //setup default widget data
  		$this->defaults = array(
  			'title'      => __('Service Title', 'parallel'),
  			'text'       => __('fa-code', 'parallel'),
  			'image_url'  => '',
  			'textarea'   => __('Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla.', 'parallel'),
  		);
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance ) {
       wp_reset_postdata();
       extract( $args, EXTR_SKIP );
       // these are the widget options
       $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
       $text = apply_filters( 'widget_text', $instance['text']);
       $image_url = apply_filters( 'widget_title', empty( $instance['image_url'] ) ? '' : $instance['image_url'], $instance, $this->id_base );
       $textarea = apply_filters( 'widget_textarea', empty( $instance['textarea'] ) ? '' : $instance['textarea'], $instance );
       echo $before_widget;
       // Display the widget
       echo '';

       // Check if text is set
       if( $text ) {
          echo '<i class="fa '.$text.'"></i>';
       }
       if( !$text && $image_url) {
          echo '<img class="icon" src="'.$image_url.'">';
       }
       // Check if title is set
       if ( $title ) {
          echo $before_title . $title . $after_title;
       }

       // Check if textarea is set
       if( $textarea ) { echo wpautop($textarea); }
       echo '';
       echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance ) {

      // update logic goes here
      $instance = $old_instance;
      // Fields
      $instance['title'] = wp_kses_post($new_instance['title']);
      $instance['text'] = wp_kses_post($new_instance['text']);
      $instance['image_url'] = esc_url_raw($new_instance['image_url']);
        if ( current_user_can('unfiltered_html') )
      $instance['textarea'] =  esc_textarea($new_instance['textarea']);
        else $instance['textarea'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['textarea']) ) );
        
      return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, $this->defaults );
?>
	<p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Service Title', 'parallel'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
  </p>
  <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Service Icon Class', 'parallel'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $instance['text']; ?>" />
      <small><?php _e('Copy and paste the required icon class from the', 'parallel'); ?> <a href="<?php echo esc_url('https://fortawesome.github.io/Font-Awesome/cheatsheet/'); ?>" target="_blank"><?php _e('Fontawesome Icons List', 'parallel'); ?></a> <?php _e('and choose from 600+ icons.', 'parallel'); ?></small>
  </p>
  <p>
      <label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Service Image', 'parallel'); ?></label>
      <br /><small><?php _e('Or instead of using an icon you can upload an image.', 'parallel'); ?></small>
      <input id="<?php echo $this->get_field_id('image_url'); ?>" type="text" class="image-url" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $instance['image_url']; ?>" style="width: 100%;" />
      <input data-title="Image in Widget" data-btntext="Select it" class="button upload_image_button" type="button" value="<?php _e('Upload','parallel') ?>" />
      <input data-title="Image in Widget" data-btntext="Select it" class="button clear_image_button" type="button" value="<?php _e('Clear','parallel') ?>" />
	</p>
	<p class="img-prev">
    <img src="<?php echo $instance['image_url']; ?>" style="max-width: 100%;">
  </p>
  <p>
      <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Description text for the service', 'parallel'); ?></label>
      <textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $instance['textarea']; ?></textarea>
      <small><?php _e('No limit on the amount of text and HTML is allowed.', 'parallel'); ?></small>
  </p>
<?php
    }
}
// End of Plugin Class

add_action( 'widgets_init', create_function( '', "register_widget( 'Parallel_Service_Widget' );" ) );

?>