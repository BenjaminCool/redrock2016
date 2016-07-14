<?php



class RedRockStyle {
  function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_styles' ) );
    add_action( 'after_switch_theme', array( $this, 'my_rewrite_flush' ) );
    $args = array(
	'flex-width'    => true,
	'width'         => 1020,
	'flex-height'    => true,
	'height'        => 250,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
    );

    add_theme_support( 'custom-header', $args );
    add_action( 'customize_register', array($this,'customize_register') );
  }

  public function theme_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', __DIR__ . '/css/bootstrap.min.css',
        array('bootstrap')
    );
    wp_enqueue_style( 'bootstrap-theme', __DIR__ . '/css/bootstrap-theme.min.css',
        array('bootstrap')
    );
    wp_enqueue_style( 'red-rock-main', __DIR__ . '/css/main.css',
        array('bootstrap','bootstrap-theme')
    );
  }

  function my_rewrite_flush() {
      flush_rewrite_rules();
  }


  function customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
    $wp_customize->add_section( 'red-rock' , array(
      'title'      => __( 'Red Rock', 'red-rock' ),
      'priority'   => 30,
    ) );

    $wp_customize->add_setting('red-rock_banner', array(
        'default'           => '',
        'capability'        => 'edit_theme_options'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'test_image', array(
        'label'    => __('Banner', 'red-rock-2016'),
        'section'  => 'red-rock',
        'settings' => 'red-rock_banner',
    )));

    $wp_customize->add_setting('red_rock_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test2', array(
        'label'    => __('Image Upload Test', 'red-rock'),
        'section'  => 'red-rock',
        'settings' => 'red_rock_logo',
    )));



  


    $wp_customize->get_setting('red-rock_banner')->transport = 'postMessage';
    $wp_customize->get_setting('red_rock_logo')->transport = 'postMessage';
  }



}

$red_rock_style = new RedRockStyle();
