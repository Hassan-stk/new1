<?php
/*
Plugin Name: weather
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Checks weather
Version: 0.1.0
Author: hassan
Author URI: http://health-check-team.example.com
*/

if(!defined('ABSPATH')){
    //abspath = absolutepath
    exit;
}

// loading script
require_once(plugin_dir_path(__FILE__).'/includes/weather-scripts.php');

//load class
require_once(plugin_dir_path(__FILE__).'/includes/weather-class.php');

//register widget
function register_weather(){
    
    register_widget('weather_Widget');
}

//hook in function

add_action('widgets_init', 'register_weather');