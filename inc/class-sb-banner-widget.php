<?php
class SB_Banner_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct('sb_banner_widget', 'SB Banner', array(
			'classname'   => 'widget_sb_banner',
			'description' => __('Show image banner on sidebar.', 'sb-banner-widget' ),
		));
	}
	
	public function widget($args, $instance) {
		$title  = apply_filters('widget_title', SB_PHP::get_single_line_value($instance['title']));
		$banner_image = isset($instance['banner_image']) ? $instance['banner_image'] : '';
		$banner_url = isset($instance['banner_url']) ? $instance['banner_url'] : '';
		$show_title = (isset($instance['use_title'])) ? $instance['use_title'] : 0;
		if(!empty($banner_image)) {
			echo $args['before_widget'];
			if(!empty($title) && (bool)$show_title) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			if(!empty($banner_url)) {
				echo '<a class="sb-banner-link" title="'.$title.'" href="'.$banner_url.'">';
			}
			echo '<img class="sb-banner-image" alt="'.$title.'" src="'.$banner_image.'">';
			if(!empty($banner_url)) {
				echo '</a>';
			}
			echo $args['after_widget'];
		}
	}
	
	public function form($instance) {
		global $sb_media_upload;
		$sb_media_upload = true;
		if($instance) {
			$show_title = (isset($instance['use_title'])) ? $instance['use_title'] : 0;
			$title = isset($instance['title']) ? $instance['title'] : '';
			$banner_image = isset($instance['banner_image']) ? $instance['banner_image'] : '';
			$banner_url = isset($instance['banner_url']) ? $instance['banner_url'] : '';
		} else {
			$show_title = 0;
			$title = '';
			$banner_image = '';
			$banner_url = '';
		}
		SB_Widget_Field::before('sb-banner-widget');
        SB_Widget_Field::title($this->get_field_id('title'), $this->get_field_name('title'), $title);

        $args = array(
            'id' => $this->get_field_id('banner_image'),
            'name' => $this->get_field_name('banner_image'),
            'value' => $banner_image,
            'label' => __('Image url:', 'sb-banner-widget')
        );
        SB_Widget_Field::media_upload($args);

        $args = array(
            'id' => $this->get_field_id('banner_url'),
            'name' => $this->get_field_name('banner_url'),
            'value' => $banner_url,
            'label' => __('Image link:', 'sb-banner-widget')
        );
        SB_Widget_Field::text($args);

        $args = array(
            'id' => $this->get_field_id('use_title'),
            'name' => $this->get_field_name('use_title'),
            'value' => $show_title,
            'label' => __('Show title', 'sb-banner-widget')
        );
        SB_Widget_Field::checkbox($args);
        SB_Widget_Field::after();
	}
	
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$show_title = isset($new_instance['use_title']) ? 1 : 0;
		$title = isset($new_instance['title']) ? $new_instance['title'] : '';
		$banner_image = isset($new_instance['banner_image']) ? $new_instance['banner_image'] : '';
		$banner_url = isset($new_instance['banner_url']) ? $new_instance['banner_url'] : '';
		$instance['title'] = $title;
		$instance['banner_image'] = $banner_image;
		$instance['banner_url'] = $banner_url;
		$instance['use_title'] = $show_title;
		return $instance;
	}
}
?>