<?php 
/**
 * new WordPress Widget format
 * WordPress 2.8 and above
 * @see http://codex.wordpress.org/Widgets_API#Developing_Widgets
 */
class Integral_Projects_Single_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
        $widget_ops = array( 'classname' => 'wcp_image', 'description' => __('Add a project to the homepage single projects section.', 'integral') );
        parent::__construct( 'Integral_projects_single', __('Integral - Single Project Widget', 'integral'), $widget_ops );
        
        //setup default widget data
		$this->defaults = array(
			'gallery'         => '',
			'textarea'   	=> '',
            'project_date'   	=> '',
            'project_client'   	=> '',
            'project_skills'   	=> '',
            'project_url'   	=> '',
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
        $gallery = $instance['gallery'];
        $textarea = apply_filters( 'widget_textarea', empty( $instance['textarea'] ) ? '' : $instance['textarea'], $instance );
        $project_date = trim($instance['project_date']);
        $project_client = trim($instance['project_client']);
        $project_skills = trim($instance['project_skills']);
        $project_url = trim($instance['project_url']);
        $has_details = !(!$project_date && !$project_client && !$project_skills && !$project_url);

        echo $before_widget;
        // Display the widget
        echo '<div class="col-md-12 project">';

        if ($gallery) { 
            echo '<div class="flexslider">';
            echo '<ul class="slides">';
            $myGalleryIDs = explode(',', $gallery);
            foreach($myGalleryIDs as $myPhotoID){
              echo '<li><img src="' . wp_get_attachment_url( $myPhotoID ) .'" class="img-responsive center-block" alt=""></li>';
            }
            echo '</ul>';
            echo '</div>';
        }
        echo '<div class="description">';

        if($has_details) {
            echo '<div class="col-md-4 details">';

            if ( $project_date ) { echo '<p>Date: <span>' . $project_date . '</span></p>';}
            if ( $project_client ) {echo '<p>Client: <span>' . $project_client . '</span></p>';}
            if ( $project_skills ) {echo '<p>Skills: <span>' . $project_skills . '</span></p>';}
            if ( $project_url ) {echo '<p><a target="_blank" href="' . $project_url . '">View Project &#8594;</a></p>';}

            echo '</div>';
        }
        // Check if textarea is set
        if( $textarea ) { 
            if($has_details)
                echo '<div class="col-md-8">';
            else
                echo '<div class="col-md-12">';

            echo '<p>' . str_replace("\n", "<br>", $textarea) . '</p>';
            echo '</div>';
        }

        echo '</div></div>';
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
        $instance['gallery'] = wp_kses_post($new_instance['gallery']);
            $instance['title'] = sanitize_text_field($new_instance['title']);
            if ( current_user_can('unfiltered_html') )
                $instance['textarea'] =  $new_instance['textarea'];
            else $instance['textarea'] = wp_kses_post($new_instance['textarea']);
        $instance['project_date'] = sanitize_text_field($new_instance['project_date']);
        $instance['project_client'] = sanitize_text_field($new_instance['project_client']);
        $instance['project_skills'] = sanitize_text_field($new_instance['project_skills']);
        $instance['project_url'] = esc_url($new_instance['project_url']);
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
        <label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Project Images/Gallery', 'integral'); ?></label>
        <br /><small><?php _e('Create a new gallery by selecting existing or uploading new images using the WordPress native uploader', 'integral'); ?></small>
        <fieldset>
            <div class="screenshot">
            <?php 
                {
                $ids = explode( ',', $instance['gallery'] );
                    foreach ( $ids as $attachment_id ) {
                        $img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                        echo '<img src="' . $img[0] . '" alt="" target="_blank" rel="external" />';
                    }
                }
            ?>
            </div>
        <input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php _e('Add/Edit Gallery','integral') ?>" />
        <input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php _e('Clear','integral') ?>" />
        <input type="hidden" class="gallery_values" name="<?php echo $this->get_field_name('gallery'); ?>" value="<?php echo esc_attr($instance['gallery']); ?>">
        </fieldset>
    <p>
        <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Project Description', 'integral'); ?></label>
        <textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo wp_kses_post($instance['textarea']); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('project_date'); ?>"><?php _e('Project Date', 'integral'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('project_date'); ?>" name="<?php echo $this->get_field_name('project_date'); ?>" type="date" value="<?php echo esc_attr($instance['project_date']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('project_client'); ?>"><?php _e('Project Client', 'integral'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('project_client'); ?>" name="<?php echo $this->get_field_name('project_client'); ?>" type="text" value="<?php echo esc_attr($instance['project_client']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('project_skills'); ?>"><?php _e('Project Skills', 'integral'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('project_skills'); ?>" name="<?php echo $this->get_field_name('project_skills'); ?>" type="text" value="<?php echo esc_attr($instance['project_skills']); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('project_url'); ?>"><?php _e('Project URL', 'integral'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('project_url'); ?>" name="<?php echo $this->get_field_name('project_url'); ?>" type="text" value="<?php echo esc_url($instance['project_url']); ?>" />
    </p> 
       
<?php
    }
}
// End of Plugin Class
add_action( 'widgets_init', function() {
    register_widget( 'Integral_Projects_Single_Widget' );
} );
?>