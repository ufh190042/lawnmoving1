<?php

function pendaftaranperkhidmatan_load_scripts(){

    wp_enqueue_style( 'borangdaftar', get_template_directory_uri().'/css/borang_pendaftaran.css', array(), '1.0.0', 'all' );



    wp_deregister_script('jquery');

    wp_register_script('jquery', get_template_directory_uri(). '/js/jquery.js', false, '3.6.0', true);

    wp_enqueue_script('jquery');

    wp_enqueue_script('stk', get_template_directory_uri().'/js/stk.js', array('jquery'), '1.0.0', 'all' );

}



add_action('wp_enqueue_scripts', 'pendaftaranperkhidmatan_load_scripts');