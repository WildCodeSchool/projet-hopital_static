<?php

/**
 * Plugin Name:       Smooth Scroll Up
 * Plugin URI:        http://wordpress.org/extend/plugins/smooth-scroll-up/
 * Description:       Smooth Scroll Up is a lightweight plugin that creates a customizable "Scroll to top / Back to top" feature in any post/page of your WordPress website.
 * Version:           1.0.0
 * Author:            Konstantinos Kouratoras
 * Author URI:        http://www.kouratoras.gr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       smooth-scroll-up
 * Domain Path:       /languages
 */

define('SMTH_SCRL_UP_PLUGIN_DIR', 'smooth-scroll-up');
define('SMTH_SCRL_UP_PLUGIN_NAME', 'Smooth Scroll Up');

class ScrollUp
{

    private $_detector;
    private $_settings;

    /**
     * Constructor
     */
    public function __construct() 
    {
        
        //Load localisation files
        add_action("plugins_loaded", array(&$this, "pluginTextdomain"));

        //Mobile detection library
        if (!class_exists('Mobile_Detect')) {
            include_once plugin_dir_path(__FILE__) . '/lib/Mobile_Detect.php';
        }        
        $this->_detector = new Mobile_Detect;

        //Options Page
        include_once plugin_dir_path(__FILE__) . '/lib/options.php';
        
        //Fetch settings
        $this->_settings = get_option('scrollup_settings');
        
        $scrollup_mobile = ($this->_settings['scrollup_mobile'] ? $this->_settings['scrollup_mobile'] : '0');
        if (!($scrollup_mobile == 0 && ($this->_detector->isMobile() || $this->_detector->isIphone()))) {
            
            //Register scripts and styles
            add_action('wp_enqueue_scripts', array(&$this, 'registerPluginScripts'));
            add_action('wp_enqueue_scripts', array(&$this, 'registerPluginStyles'));

            //Action links
            add_filter('plugin_action_links', array(&$this, 'pluginActionLinks'), 10, 2);

            //Start up script
            add_action('wp_footer', array(&$this, 'pluginInit'));
        }

        //Register admin scripts
        add_action('admin_enqueue_scripts', array(&$this, 'registerPluginAdminScripts'));
    }

    /**
     * This function loads the text domain
     */
    function pluginTextdomain() 
    {
        load_plugin_textdomain('smooth-scroll-up', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    /**
     * This function add action links in plugins listing page
     */
    function pluginActionLinks($links, $file) 
    {
        static $current_plugin = '';

        if (!$current_plugin) {
            $current_plugin = plugin_basename(__FILE__);
        }

        if ($file == $current_plugin) {
            $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=smooth_scroll_up">' . __('Settings', 'smooth-scroll-up') . '</a>';
            array_unshift($links, $settings_link);
        }

        return $links;
    }

    /**
     * This function initializes the plugin
     */
    function pluginInit() 
    {

        $scrollup_specific_ids = (isset($this->_settings['scrollup_specific_ids']) ? $this->_settings['scrollup_specific_ids'] : '');

        if (!empty($scrollup_specific_ids)) {

            $scrollup_specific_ids = explode(",", $scrollup_specific_ids);
            $scrollup_specific_ids_show_hide = (isset($this->_settings['scrollup_specific_ids_show_hide']) ? $this->_settings['scrollup_specific_ids_show_hide'] : 'hide');

            if (( in_array(get_the_ID(), $scrollup_specific_ids) && ($scrollup_specific_ids_show_hide == "hide")) || ( !in_array(get_the_ID(), $scrollup_specific_ids) && ($scrollup_specific_ids_show_hide == "show")) ) {
                return;    
            }
        }

        $scrollup_show = ($this->_settings['scrollup_show'] ? $this->_settings['scrollup_show'] : '0');

        if ($scrollup_show == "1" || ($scrollup_show == "0" && !(is_home() || is_front_page()))) {
            
            //Fetch options
            $scrollup_type = ($this->_settings['scrollup_type'] ? $this->_settings['scrollup_type'] : 'tab');
            $scrollup_position = ($this->_settings['scrollup_position'] ? $this->_settings['scrollup_position'] : 'right');
            $scrollup_text = ($this->_settings['scrollup_text'] ? html_entity_decode($this->_settings['scrollup_text']) : 'Scroll to top');
            $scrollup_distance = ($this->_settings['scrollup_distance'] ? html_entity_decode($this->_settings['scrollup_distance']) : '300');
            $scrollup_animation = ($this->_settings['scrollup_animation'] ? $this->_settings['scrollup_animation'] : 'fade');
            $scrollup_attr = ($this->_settings['scrollup_attr'] ? html_entity_decode($this->_settings['scrollup_attr']) : '');
            
            //Scroll up type class
            $scrollup_type_class = 'scrollup-tab';
            if ($scrollup_type == 'link') {
                $scrollup_type_class = 'scrollup-link';
            } else if ($scrollup_type == 'pill') {
                $scrollup_type_class = 'scrollup-pill';
            } else if ($scrollup_type == 'image') {
                $scrollup_type_class = 'scrollup-image';
                $scrollup_text = "";

                $scrollup_custom_image = ($this->_settings['scrollup_custom_image'] ? $this->_settings['scrollup_custom_image'] : '../img/scrollup.png');
                echo '<style>a.scrollup-image {background-image: url("'.$scrollup_custom_image.'") !important; }</style>';
            } else {
                $scrollup_type_class = 'scrollup-tab';
            }

            //Scroll up position class
            $scrollup_position_class = 'scrollup-left';
            if ($scrollup_position == 'center') {
                $scrollup_position_class = 'scrollup-center';
            } else if ($scrollup_position == 'right') {
                $scrollup_position_class = 'scrollup-right';
            } else {
                $scrollup_position_class = 'scrollup-left';
            }

            //Creation script
            echo '<script> var $nocnflct = jQuery.noConflict();
			$nocnflct(function () {
			    $nocnflct.scrollUp({
				scrollName: \'scrollUp\', // Element ID
				scrollClass: \'scrollUp '.$scrollup_type_class.' '.$scrollup_position_class.'\', // Element Class
				scrollDistance: ' . $scrollup_distance . ', // Distance from top/bottom before showing element (px)
				scrollFrom: \'top\', // top or bottom
				scrollSpeed: 300, // Speed back to top (ms)
				easingType: \'linear\', // Scroll to top easing (see http://easings.net/)
				animation: \'' . $scrollup_animation . '\', // Fade, slide, none
				animationInSpeed: 200, // Animation in speed (ms)
				animationOutSpeed: 200, // Animation out speed (ms)
				scrollText: \'' . $scrollup_text . '\', // Text for element, can contain HTML
				scrollTitle: false, // Set a custom link title if required. Defaults to scrollText
				scrollImg: false, // Set true to use image
				activeOverlay: false, // Set CSS color to display scrollUp active point
				zIndex: 2147483647 // Z-Index for the overlay
			    });
			});';

            //Onclick function
            if ($scrollup_attr != '') {
                echo '
				$nocnflct( document ).ready(function() {   
					$nocnflct(\'#scrollUp\').attr(\'onclick\', \'' . $scrollup_attr . '\');
				});
				'; 
            }

            echo '</script>';
        }
    }

    /**
     * This function registers scripst on the frontend
     */
    function registerPluginScripts() 
    {

        wp_enqueue_script('jquery');

        wp_register_script(
            'scrollup-js', plugins_url(SMTH_SCRL_UP_PLUGIN_DIR . '/js/jquery.scrollUp.min.js'), '', '', true
        );
        wp_enqueue_script('scrollup-js');
    }

    /**
     * This function registers styles on the frontend
     */
    function registerPluginStyles() 
    {

        wp_register_style(
            'scrollup-css', plugins_url(SMTH_SCRL_UP_PLUGIN_DIR . '/css/scrollup.css')
        );
        wp_enqueue_style('scrollup-css');
    }

    /**
     * This function registers scripts on the backend
     */
    function registerPluginAdminScripts() 
    {

        $currentScreen = get_current_screen();
        if ($currentScreen->id === "settings_page_smooth_scroll_up" ) {

            wp_enqueue_script('jquery');
            wp_enqueue_media();

            wp_register_script(
                'smooth-scrollup-js', plugins_url(SMTH_SCRL_UP_PLUGIN_DIR . '/js/smooth-scroll-up.js'), '', '', true
            );
            wp_enqueue_script('smooth-scrollup-js');
        }
    }

}

new ScrollUp();
