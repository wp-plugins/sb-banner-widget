<?php
function sb_banner_widget_check_core() {
    $activated_plugins = get_option('active_plugins');
    $sb_core_installed = in_array('sb-core/sb-core.php', $activated_plugins);
    return $sb_core_installed;
}

function sb_banner_widget_activation() {
    if(!current_user_can('activate_plugins')) {
        return;
    }
    do_action('sb_banner_widget_activation');
}
register_activation_hook( SB_BANNER_WIDGET_FILE, 'sb_banner_widget_activation' );

function sb_banner_widget_check_admin_notices() {
    if(!sb_banner_widget_check_core()) {
        unset($_GET['activate']);
        printf('<div class="error"><p><strong>' . __('Error', 'sb-banner-widget') . ':</strong> ' . __('The plugin with name %1$s has been deactivated because of missing %2$s plugin', 'sb-banner-widget') . '.</p></div>', '<strong>SB Banner Widget</strong>', sprintf('<a target="_blank" href="%s" style="text-decoration: none">SB Core</a>', 'https://wordpress.org/plugins/sb-core/'));
        deactivate_plugins(SB_BANNER_WIDGET_BASENAME);
    }
}
if(!empty($GLOBALS['pagenow']) && 'plugins.php' === $GLOBALS['pagenow']) {
    add_action('admin_notices', 'sb_banner_widget_check_admin_notices', 0);
}

function sb_banner_widget_settings_link($links) {
    if(sb_banner_widget_check_core()) {
        $settings_link = sprintf('<a href="admin.php?page=sb_banner_widget">%s</a>', __('Settings', 'sb-banner-widget'));
        array_unshift($links, $settings_link);
    }
    return $links;
}
//add_filter('plugin_action_links_' . SB_BANNER_WIDGET_BASENAME, 'sb_banner_widget_settings_link');

function sb_banner_widget_textdomain() {
    load_plugin_textdomain('sb-banner-widget', false, SB_BANNER_WIDGET_DIRNAME . '/languages/');
}
add_action('plugins_loaded', 'sb_banner_widget_textdomain');