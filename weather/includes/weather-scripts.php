
<?php

// Add scripts
function weather_add_scripts(){
    //Add Main CSS
    wp_enqueue_style('weather-main-style', plugins_url(). '/weather/css/style.css');
    // Add Main JS
    wp_enqueue_script('weather-main-script', plugins_url(). '/weather/js/main.js');

    //Add google Script
    wp_register_script('weatherwidget','https://weatherwidget.io/js/widget.min.js');
    
    wp_enqueue_script('weatherwidget');
}

add_action('wp_enqueue_scripts', 'weather_add_scripts');



