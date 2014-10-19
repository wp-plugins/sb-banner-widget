<?php
/*
Plugin Name: SB Banner Widget
Plugin URI: http://hocwp.net/
Description: SB Banner Widget is a plugin that allows to add banner widget on your WordPress site.
Author: SB Team
Version: 1.0.1
Author URI: http://hocwp.net/
Text Domain: sb-banner-widget
Domain Path: /languages/
*/

define('SB_BANNER_WIDGET_FILE', __FILE__);

define('SB_BANNER_WIDGET_PATH', untrailingslashit(plugin_dir_path(SB_BANNER_WIDGET_FILE)));

define('SB_BANNER_WIDGET_URL', plugins_url('', SB_BANNER_WIDGET_FILE));

define('SB_BANNER_WIDGET_INC_PATH', SB_BANNER_WIDGET_PATH . '/inc');

define('SB_BANNER_WIDGET_BASENAME', plugin_basename(SB_BANNER_WIDGET_FILE));

define('SB_BANNER_WIDGET_DIRNAME', dirname(SB_BANNER_WIDGET_BASENAME));

require SB_BANNER_WIDGET_INC_PATH . '/sb-plugin-functions.php';