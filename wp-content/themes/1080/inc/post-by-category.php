<?php
class Lv1080_Posts_By_Category_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'posts_by_category_widget', // Base ID
			esc_html__( 'Bài viết theo danh mục', 'lv1080' ), // Name
			array( 'description' => esc_html__( 'Chọn bài viết theo danh mục', 'lv1080' ), ) // Args
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
		echo $args['before_widget'];
		
		$queryArgs = $this->queryArgs($instance);
		$cat_posts = new WP_Query( $queryArgs );
		
		if ( $cat_posts->have_posts() ) {	
			//title	
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
			if ( isset( $instance["thumb"] ) && $instance["thumb"]) {
				echo '<ul class="media-list">';
			} else {
				echo '<ul class="sidebar-list__service list-default">';
			}

			

			while ( $cat_posts->have_posts() ) {
                $cat_posts->the_post();              
				echo $this->itemHTML($instance);
			}

			wp_reset_postdata();
			echo "</ul>\n";
			
		} 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Danh mục', 'lv1080' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Tiêu đề:', 'lv1080' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
	        <label>
	            <?php _e( 'Danh mục','lv1080' ); ?>:
	            <?php wp_dropdown_categories( array( 'show_option_all' => __('Tất cả danh mục','lv1080'), 'hide_empty'=> 0, 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"], 'class' => 'posts-by-category' ) ); ?>
	        </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("num"); ?>">
                <?php _e('Số bài hiển thị','lv1080'); ?>:
                <input id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="number" min="0" value="<?php echo absint($instance["num"]); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("thumb"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("thumb"); ?>" name="<?php echo $this->get_field_name("thumb"); ?>"<?php checked( (bool) $instance["thumb"], true ); ?> />
                <?php _e( 'Hiển thị ảnh đại diện','lv1080' ); ?>
            </label>
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
		$new_instance['title'] = sanitize_text_field( $new_instance['title'] );  // sanitize the title like core widgets do

		return $new_instance;
	}

	/**
	 * Calculate the HTML for a post item based on the widget settings and post.
     * Expected to be called in an active loop with all the globals set
	 *
	 * @param  array $instance Array which contains the various settings
     * $param  null|integer $current_post_id If on singular page specifies the id of
     *                      the post, otherwise null
	 * @return string The HTML for item related to the post
     *
     * @since 4.6
	 */
    function itemHTML($instance) {
        global $post;
		
        // Has thumbnail
        if ( isset( $instance["thumb"] ) && $instance["thumb"]) {
            $ret .= '<li class="media">
            <div class="media-left">
	            <a class="media-image" href="'.get_permalink().'">'.get_the_post_thumbnail (null, 'lv1080-thumbnail-sidebar', array('class'=>'media-object')) .'</a></div><div class="media-body">
                    <a href="'.get_permalink().'">'.get_the_title() .'</a></div></li>';
        } else {// No thumbnail
        	$ret .= '<li><a href="'.get_permalink().'">'.get_the_title() .'</a></li>';
        }

        return $ret;
    }
	
	/**
	 * Calculate the wp-query arguments matching the filter settings of the widget
	 *
	 * @param  array $instance Array which contains the various settings
	 * @return array The array that can be fed to wp_Query to get the relevant posts
     *
     * @since 4.6
	 */
    function queryArgs($instance) {
		$valid_sort_orders = array('date', 'title', 'comment_count', 'rand');
		if ( isset($instance['sort_by']) && in_array($instance['sort_by'],$valid_sort_orders) ) {
			$sort_by = $instance['sort_by'];
		} else {
			$sort_by = 'date';
		}
        $sort_order = (isset( $instance['asc_sort_order'] ) && $instance['asc_sort_order']) ? 'ASC' : 'DESC';
		
		// Get array of post info.
		$args = array(
			'orderby' => $sort_by,
			'order' => $sort_order
		);
        
        if (isset($instance["num"])) 
            $args['showposts'] = (int) $instance["num"];
		
        if (isset($instance["cat"]))  {
			if (isset($instance["no_cat_childs"]) && $instance["no_cat_childs"])
				$args['category__in'] = (int) $instance["cat"];	
			else
				$args['cat'] = (int) $instance["cat"];			
		}

        if (is_singular() && isset( $instance['exclude_current_post'] ) && $instance['exclude_current_post']) 
            $args['post__not_in'] = array(get_the_ID());
        
        return $args;
    }

} // class Posts_By_Category_Widget

