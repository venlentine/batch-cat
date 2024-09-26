<?php

/**
 * WPJun-Helper class-wpsweep.php
 *
 * @package wpjun-helper
 */

/**
 * WPJun-Helper class
 *
 * @since 1.0.0
 */
class WPJunHelper {
	/**
	 * Limit the number of items to show for details
	 *
	 * @since 1.0.3
	 *
	 * @access public
	 * @var int
	 */
	public $limit_details = 500;
    /**
     * Static instance
     *
     * @since 1.0.0
     *
     * @access private
     * @var WPSweep|null
     */
    private static $instance;

    /**
     * Constructor method
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct()
    {
        // Add Plugin Hooks.
        add_action('plugins_loaded', array($this, 'add_hooks'));

        // Load Translation.
        load_plugin_textdomain('wpjun-helper');

        // Plugin Activation/Deactivation.
        register_activation_hook(WPJUN_HELPER_MAIN_FILE, array($this, 'plugin_activation'));
        register_deactivation_hook(WPJUN_HELPER_MAIN_FILE, array($this, 'plugin_deactivation'));
    }

    /**
     * Initializes the plugin object and returns its instance
     *
     * @since 1.0.0
     *
     * @access public
     * @return object The plugin object instance
     */
    public static function get_instance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Init this plugin
     *
     * @since 1.0.0
     *
     * @access public
     * @return void
     */
    public function init()
    {
        // include class for WP CLI command.
        if (defined('WP_CLI')) {
            require __DIR__ . '/class-wpjunhelper-command.php';
            WP_CLI::add_command('wphelper', 'WPJun-Helper_Command');
        }
    }

    /**
     * Adds all the plugin hooks
     *
     * @since 1.0.0
     *
     * @access public
     * @return void
     */
    public function add_hooks()
    {
        // Actions.
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        add_action('wp_ajax_sweep_details', array($this, 'ajax_sweep_details'));
        add_action('wp_ajax_sweep', array($this, 'ajax_sweep'));
    }

}