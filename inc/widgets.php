<?php

/**
 * This function just gives active widgets a chance to enqueue their scripts
 */
function siteorigin_widgets_enqueue_widget_scripts() {
	global $wp_registered_widgets, $post;
	$active_widgets = array();

	$panel_widget_classes = array();

	if ( is_singular() ) {
		$panels_data = get_post_meta( $post->ID, 'panels_data', true );
	}
	elseif ( function_exists('siteorigin_panels_is_home') && siteorigin_panels_is_home() ) {
		$panels_data = get_option('siteorigin_panels_home_page', null);
	}

	if ( !empty( $panels_data['widgets'] ) ) {
		foreach ( $panels_data['widgets'] as $widget ) {
			$panel_widget_classes[ ] = empty($widget['panels_info']) ? $widget['info']['class'] : $widget['panels_info']['class'];
		}
	}

	foreach ( $wp_registered_widgets as $widget ) {
		if ( !empty( $widget['callback'][ 0 ] ) && is_object( $widget['callback'][ 0 ] ) ) {
			if ( is_active_widget( false, false, $widget['callback'][ 0 ]->id_base ) ) $active_widgets[ ] = $widget['callback'][ 0 ]->id_base;
			if ( !empty( $panel_widget_classes ) && in_array( get_class( $widget['callback'][ 0 ] ), $panel_widget_classes ) ) $active_widgets[ ] = $widget['callback'][ 0 ]->id_base;
		}
	}

	$active_widgets = array_unique( $active_widgets );

	foreach ( $active_widgets as $widget ) {
		do_action( 'siteorigin_enqueue_widget_scripts_' . $widget );
	}
}

add_action( 'wp_enqueue_scripts', 'siteorigin_widgets_enqueue_widget_scripts' );


/**
 * A call to action widget. Designed to be used on a home page panel
 */
class SiteOrigin_Widgets_CTA extends WP_Widget {
	function __construct() {
		parent::__construct(
			'call-to-action',
			__( 'SiteOrigin Call To Action', 'origami' ),
			array(
				'description' => __( 'A call to action block, generally for your home page.', 'origami' ),
			)
		);
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {

		echo $args['before_widget'];
		if ( !empty( $instance['headline'] ) ) echo '<h2 class="cta-headline">' . esc_html( $instance['headline'] ) . '</h2>';
		if ( !empty( $instance['text'] ) ) echo '<p class="cta-sub-text">' . esc_html( $instance['text'] ) . '</p>';
		if ( !empty( $instance['url'] ) ) {
			?>
		<a href="<?php echo esc_url( $instance['url'] ) ?>" class="button cta-button <?php if ( !empty( $instance['button_style'] ) ) echo esc_attr( 'button-' . $instance['button_style'] . ' cta-button-' . $instance['button_style'] ) ?>">
			<span><?php echo esc_html( $instance['button'] ) ?></span>
		</a>
		<?php
		}
		echo $args['after_widget'];
	}

	/**
	 * @param array $new
	 * @param array $old
	 * @return array|void
	 */
	function update( $new, $old ) {
		$new['headline'] = esc_html( $new['headline'] );
		$new['text'] = esc_html( $new['text'] );
		$new['button'] = esc_html( $new['button'] );
		$new['url'] = esc_url_raw( $new['url'] );
		return $new;
	}

	/**
	 * @param array $instance
	 * @return string|void
	 */
	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'headline' => '',
			'text' => '',
			'button' => '',
			'url' => '',
			'button_style' => false,
		) );

		/**
		 * This gives themes a chance to add their own button styles
		 */
		$button_styles = apply_filters( 'siteorigin_button_styles', array() );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'headline' ) ?>"><?php _e( 'Headline', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'headline' ) ?>" for="<?php echo $this->get_field_id( 'headline' ) ?>" value="<?php echo esc_attr( $instance['headline'] ) ?>">
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ) ?>"><?php _e( 'Text', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'text' ) ?>" id="<?php echo $this->get_field_id( 'text' ) ?>" value="<?php echo esc_attr( $instance['text'] ) ?>">
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'button' ) ?>"><?php _e( 'Button Text', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'button' ) ?>" for="<?php echo $this->get_field_id( 'button' ) ?>" value="<?php echo esc_attr( $instance['button'] ) ?>">
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ) ?>"><?php _e( 'Button URL', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'url' ) ?>" for="<?php echo $this->get_field_id( 'url' ) ?>" value="<?php echo esc_attr( $instance['url'] ) ?>">
		</p>
	
		<?php if ( !empty( $button_styles ) ) : ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'button_style' ) ?>"><?php _e( 'Button Style', 'origami' ) ?></label>
				<select name="<?php echo $this->get_field_name( 'button_style' ) ?>" for="<?php echo $this->get_field_id( 'button_style' ) ?>">
					<?php foreach ( $button_styles as $style => $name ) : ?>
					<option value="<?php echo esc_attr( $style ) ?>"><?php echo esc_html( $name ) ?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php
		endif;
	}
}

/**
 * A call to action widget. Designed to be used on a home page panel
 */
class SiteOrigin_Widgets_Button extends WP_Widget {
	function __construct() {
		parent::__construct(
			'button',
			__( 'SiteOrigin Button', 'origami' ),
			array(
				'description' => __( 'Display a button.', 'origami' ),
			)
		);
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {

		$instance = wp_parse_args( $instance, array(
			'url' => '#',
			'button' => __( 'Click Me', 'origami' ),
			'align' => 'center',
		) );

		echo $args['before_widget'];
		echo '<div class="button-container align-' . esc_attr( $instance['align'] ) . '">';
		if ( !empty( $instance['url'] ) ) {
			?>
			<a href="<?php echo esc_url( $instance['url'] ) ?>" class="cta-button button <?php if ( !empty( $instance['button_style'] ) ) echo esc_attr( 'cta-button-' . $instance['button_style'] . ' button-' . $instance['button_style'] ) ?>">
				<span><?php echo esc_html( $instance['button'] ) ?></span>
			</a>
			<?php
		}
		echo '</div>';
		echo $args['after_widget'];
	}

	/**
	 * @param array $new
	 * @param array $old
	 * @return array
	 */
	function update( $new, $old ) {
		$new['button'] = strip_tags( $new['button'] );
		$new['url'] = esc_url_raw( $new['url'] );
		return $new;
	}

	/**
	 * @param array $instance
	 * @return string|void
	 */
	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'button' => '',
			'url' => '',
			'align' => 'center',
			'button_style' => false,
		) );

		/**
		 * This gives themes a chance to add their own button styles
		 */
		$button_styles = apply_filters( 'siteorigin_button_styles', array() );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'button' ) ?>"><?php _e( 'Button Text', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'button' ) ?>" for="<?php echo $this->get_field_id( 'button' ) ?>" value="<?php echo esc_attr( $instance['button'] ) ?>">
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ) ?>"><?php _e( 'Button URL', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'url' ) ?>" for="<?php echo $this->get_field_id( 'url' ) ?>" value="<?php echo esc_attr( $instance['url'] ) ?>">
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'align' ) ?>"><?php _e( 'Alignment', 'origami' ) ?></label>
			<select name="<?php echo $this->get_field_name( 'align' ) ?>" id="<?php echo $this->get_field_id( 'align' ) ?>">
				<option value="left" <?php selected( 'left', $instance['align'] ) ?>><?php esc_html_e( 'Left', 'origami' ) ?></option>
				<option value="center" <?php selected( 'center', $instance['align'] ) ?>><?php esc_html_e( 'Center', 'origami' ) ?></option>
				<option value="right" <?php selected( 'right', $instance['align'] ) ?>><?php esc_html_e( 'Right', 'origami' ) ?></option>
				<option value="full" <?php selected( 'full', $instance['align'] ) ?>><?php esc_html_e( 'Full Width', 'origami' ) ?></option>
			</select>
		</p>
	
		<?php if ( !empty( $button_styles ) ) : ?>
			<p>
				<label for="<?php echo $this->get_field_id( 'button_style' ) ?>"><?php _e( 'Button Style', 'origami' ) ?></label>
				<select name="<?php echo $this->get_field_name( 'button_style' ) ?>" for="<?php echo $this->get_field_id( 'button_style' ) ?>">
					<?php foreach ( $button_styles as $style => $name ) : ?>
					<option value="<?php echo esc_attr( $style ) ?>"><?php echo esc_html( $name ) ?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php
		endif;
	}
}

/**
 * A widget that displays some text, a headline and an icon.
 */
class SiteOrigin_Widgets_IconText extends WP_Widget {
	function __construct() {
		parent::__construct(
			'icon-text',
			__( 'SiteOrigin Icon and Text', 'origami' ),
			array(
				'description' => __( 'A block of text with an icon.', 'origami' ),
			)
		);
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty( $instance['icon'] ) ) {
			?><div class="feature-icon"><?php echo wp_get_attachment_image($instance['icon'], 'thumbnail') ?></div><?php
		}
		
		if ( !empty( $instance['headline'] ) ) {
			echo $args['before_title'];
			if(!empty($instance['url'])) echo '<a href="'.esc_url($instance['url']).'">';
			echo $instance['headline'];
			if(!empty($instance['url'])) echo '</a>';
			echo $args['after_title'];
		}

		if ( !empty( $instance['text'] ) ) {
			?><div class="widget-text entry-content"><?php echo wpautop( do_shortcode( $instance['text'] ) ) ?></div><?php
		}

		echo $args['after_widget'];
	}

	/**
	 * @param array $new
	 * @param array $old
	 * @return array|void
	 */
	function update( $new, $old ) {
		$instance = $new;

		$instance['headline'] = strip_tags( $instance['headline'] );
		if ( current_user_can( 'unfiltered_html' ) )
			$instance['text'] = $instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes( $instance['text'] ) ) );
		$instance['url'] = esc_url_raw( $instance['url'] );

		return $instance;
	}

	/**
	 * @param array $instance
	 * @return string|void
	 */
	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'headline' => '',
			'text' => '',
			'url' => '',
			'icon' => false,
		) ) ;
		
		$attachments = get_posts(array(
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'posts_per_page' => -1,
			'post_status' => 'any'
		));
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'headline' ) ?>"><?php _e( 'Headline', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'headline' ) ?>" id="<?php echo $this->get_field_id( 'headline' ) ?>" value="<?php echo esc_attr( $instance['headline'] ) ?>">
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ) ?>"><?php _e( 'Text', 'origami' ) ?></label>
			<textarea class="widefat" rows="3" name="<?php echo $this->get_field_name( 'text' ) ?>" id="<?php echo $this->get_field_id( 'headline' ) ?>"><?php echo esc_textarea( $instance['text'] ) ?></textarea>
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ) ?>"><?php _e( 'URL', 'origami' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'url' ) ?>" id="<?php echo $this->get_field_id( 'url' ) ?>" value="<?php echo esc_attr( $instance['url'] ) ?>">
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'icon' ) ?>"><?php _e( 'Icon', 'origami' ) ?></label>
			<select name="<?php echo $this->get_field_name( 'icon' ) ?>" id="<?php echo $this->get_field_id( 'icon' ) ?>">
				<option value="0" <?php selected( !empty($instance['icon']) ) ?>><?php echo esc_html_e('None', 'origami') ?></option>
				<?php foreach ( $attachments as $attachment ) : ?>
					<option value="<?php echo $attachment->ID ?>" <?php selected( $instance['icon'], $attachment->ID ) ?>><?php echo esc_html( $attachment->post_title ) ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p class="description">
			<?php
			printf(
				__('Upload icon images to your <a href="%s" target="_blank">media library</a>. Find <a href="%s" target="_blank">free icon packs</a>.', 'origami'),
				admin_url('upload.php'),
				'http://siteorigin.com/icon-sets/'
			);
			?>
		</p>
		<?php
	}
}


/**
 * Simply displays a headline
 */
class SiteOrigin_Widgets_Headline extends WP_Widget {
	function __construct() {
		parent::__construct(
			'headline',
			__( 'SiteOrigin Headline', 'origami' ),
			array(
				'description' => __( 'Displays a simple headline.', 'origami' ),
			)
		);
	}

	function widget( $args, $instance ) {
		if ( empty( $instance['headline'] ) ) return;

		echo $args['before_widget'];
		echo $args['before_title'] . '<span class="size-' . $instance['size'] . ' align-' . $instance['align'] . '">' . $instance['headline'] . '</span>' . $args['after_title'];
		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'headline' => '',
			'size' => 'large',
			'align' => 'center'
		) );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'headline' ) ?>"><?php _e( 'Headline Text', 'origami' ) ?>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'headline' ) ?>" id="<?php echo $this->get_field_id( 'headline' ) ?>" value="<?php echo esc_attr( $instance['headline'] ) ?>" />
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'size' ) ?>"><?php _e( 'Size', 'origami' ) ?></label>
			<select name="<?php echo $this->get_field_name( 'size' ) ?>" id="<?php echo $this->get_field_id( 'size' ) ?>">
				<option value="small" <?php selected( 'small', $instance['size'] ) ?>><?php esc_html_e( 'Small', 'origami' ) ?></option>
				<option value="medium" <?php selected( 'medium', $instance['size'] ) ?>><?php esc_html_e( 'Medium', 'origami' ) ?></option>
				<option value="large" <?php selected( 'large', $instance['size'] ) ?>><?php esc_html_e( 'Large', 'origami' ) ?></option>
				<option value="extra-large" <?php selected( 'extra-large', $instance['size'] ) ?>><?php esc_html_e( 'Extra Large', 'origami' ) ?></option>
			</select>
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'align' ) ?>"><?php _e( 'Alignment', 'origami' ) ?></label>
			<select name="<?php echo $this->get_field_name( 'align' ) ?>" id="<?php echo $this->get_field_id( 'align' ) ?>">
				<option value="left" <?php selected( 'left', $instance['align'] ) ?>><?php esc_html_e( 'Left', 'origami' ) ?></option>
				<option value="center" <?php selected( 'center', $instance['align'] ) ?>><?php esc_html_e( 'Center', 'origami' ) ?></option>
				<option value="right" <?php selected( 'right', $instance['align'] ) ?>><?php esc_html_e( 'Right', 'origami' ) ?></option>
			</select>
		</p>
		<?php
	}
}

/**
 * Initialize the SiteOrigin widgets. This can be called on widgets_init
 */
function siteorigin_widgets_init() {
	register_widget( 'SiteOrigin_Widgets_Button' );
	register_widget( 'SiteOrigin_Widgets_CTA' );
	register_widget( 'SiteOrigin_Widgets_Headline' );
	register_widget( 'SiteOrigin_Widgets_IconText' );
}
