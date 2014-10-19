<?php
function sb_banner_widget_check_core() {
    $activated_plugins = get_option('active_plugins');
    $sb_core_installed = in_array('sb-core/sb-core.php', $activated_plugins);
    if(!$sb_core_installed) {
        $sb_plugins = array(SB_BANNER_WIDGET_BASENAME);
        $activated_plugins = get_option('active_plugins');
        $activated_plugins = array_diff($activated_plugins, $sb_plugins);
        update_option('active_plugins', $activated_plugins);
    }
    return $sb_core_installed;
}

function sb_banner_widget_activation() {
    if(!sb_banner_widget_check_core()) {
        wp_die(sprintf(__('You must install and activate plugin %1$s first! Click here to %2$s.', 'sb-banner-widget'), '<a href="https://wordpress.org/plugins/sb-core/">SB Core</a>', sprintf('<a href="%1$s">%2$s</a>', admin_url('plugins.php'), __('go back', 'sb-banner-widget'))));
    }
    do_action('sb_banner_widget_activation');
}
register_activation_hook( SB_BANNER_WIDGET_FILE, 'sb_banner_widget_activation' );

if(!sb_banner_widget_check_core()) {
    return;
}

function sb_banner_widget_settings_link($links) {
    if(sb_banner_widget_check_core()) {
        $settings_link = sprintf('<a href="admin.php?page=sb_banner_widget">%s</a>', __('Settings', 'sb-banner-widget'));
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links_' . SB_BANNER_WIDGET_BASENAME, 'sb_banner_widget_settings_link');

function sb_banner_widget_textdomain() {
    load_plugin_textdomain('sb-banner-widget', false, SB_BANNER_WIDGET_DIRNAME . '/languages/');
}
add_action('plugins_loaded', 'sb_banner_widget_textdomain');

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

require SB_BANNER_WIDGET_INC_PATH . '/sb-plugin-load.php';