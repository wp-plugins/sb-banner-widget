<?php
function sb_banner_widget_init() {
    register_widget('SB_Banner_Widget');
}
add_action('widgets_init', 'sb_banner_widget_init');

function sb_banner_widget_admin_style_and_script() {
    $screen = get_current_screen();
    if('widgets' == $screen->base) {
        wp_enqueue_media();
        wp_enqueue_script('sb-banner-widget-admin', SB_BANNER_WIDGET_URL . '/js/sb-banner-widget-admin-script.js', array('jquery'), false, true);
    }
}
add_action('admin_enqueue_scripts', 'sb_banner_widget_admin_style_and_script');