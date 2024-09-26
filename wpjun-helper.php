<?php

/**
 * WPJun-Helper
 *
 * @package wpjun-helper
 *
 * @wordpress-plugin
 * Plugin Name: WPJun-Helper
 * Plugin URI: https://github.com/venlentine
 * Description: A plugin which offers the abillity to change categories of articles in batches
 * Version: 1.0.0
 * Author: Venlentine
 * Author URI: https://github.com/venlentine
 * Text Domain: wpjun-helper
 * License: GPL2
 *
 *     Copyright 2024  Lester Chan  (email : lesterchan@gmail.com)
 *
 *     This program is free software; you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License, version 2, as
 *     published by the Free Software Foundation.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with this program; if not, write to the Free Software
 *     Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * WPJun-Helper version
 *
 * @since 1.0.0
 */
define('WPJUN_HELPER_VERSION', '1.0.0');

/**
 * WPJun-Helper main file
 */
define('WPJUN_HELPER_MAIN_FILE', __FILE__);

require __DIR__ . '/inc/class-wpjunhelper.php';
require __DIR__ . '/inc/class-wpjunhelper-api.php';

/**
 * WP Rest API
 */
new WPJunHelper_Api();

/**
 * Init WPJun-Helper
 */
WPJunHelper::get_instance();

?>
