<?php
require SB_BANNER_WIDGET_INC_PATH . '/sb-plugin-install.php';

if(!sb_banner_widget_check_core()) {
    return;
}

require SB_BANNER_WIDGET_INC_PATH . '/class-sb-banner-widget.php';

require SB_BANNER_WIDGET_INC_PATH . '/sb-plugin-admin.php';

require SB_BANNER_WIDGET_INC_PATH . '/sb-plugin-hook.php';