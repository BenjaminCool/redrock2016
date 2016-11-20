<?php


class RedRockStyle {

  function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_styles' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_scripts' ) );
    add_action( 'after_switch_theme', array( $this, 'my_rewrite_flush' ) );
    add_filter('nav_menu_css_class' , array( $this, 'add_active_nav_class') , 10 , 4);
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


	
	function add_active_nav_class($classes, $item, $args, $depth){
		//echo json_encode($item);
     		if( $item->url == home_url().$_SERVER['REQUEST_URI'] ){
             		$classes[] = 'active ';
     		}
     		
     		if($item->title == 'Menu' && strpos($_SERVER['REQUEST_URI'],'menu') !== false){
     			$classes[] = 'active ';
     		}
     		
     return $classes;
	}
  
  public function theme_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    //wp_enqueue_style( 'bootstrap-theme', get_stylesheet_directory_uri() . '/css/bootstrap-theme.min.css',
    //    array('bootstrap')
    //);
    wp_enqueue_style( 'red-rock-main', get_stylesheet_directory_uri() . '/css/main.css',
        array('bootstrap')
    );
		
		
  }
  
  public function theme_enqueue_scripts() {
		if( !is_admin() ){
			wp_deregister_script('jquery');
			wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
			wp_enqueue_script('jquery');
		}
		wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri().'/js/bootstrap.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'tween-max', get_stylesheet_directory_uri().'/js/gsap/TweenMax.min.js', null, null, true );
		//wp_enqueue_script( 'main-js', get_stylesheet_directory_uri().'/js/mainjs.js', array('jquery','bootstrap-js'), null, true );
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

    $this->add_image_to_customizer($wp_customize,'Global Banner');
    $this->add_image_to_customizer($wp_customize,'Red Rock Logo');
    
    $this->add_image_to_customizer($wp_customize,'Main Promo Image');
    $this->add_image_to_customizer($wp_customize,'Watch Image');

    $this->add_image_to_customizer($wp_customize,'Footer Location Icon');
    $this->add_image_to_customizer($wp_customize,'Star Image');
    
    $this->add_text_to_customizer($wp_customize,'Footer Location Text');
    
    $this->add_text_to_customizer($wp_customize,'Hours 1');
    $this->add_text_to_customizer($wp_customize,'Hours 2');
    $this->add_text_to_customizer($wp_customize,'Hours 3');
  
    $this->add_page_to_customizer($wp_customize,'Main Footer Link');


		$wp_customize->add_section( 'background-images' , array(
      'title'      => __( 'Background Images', 'background-images' ),
      'priority'   => 10,
    ) );
    
    $this->add_image_to_customizer($wp_customize,'Image 1', 'background-images');
    $this->add_image_to_customizer($wp_customize,'Image 2', 'background-images');
    $this->add_image_to_customizer($wp_customize,'Image 3', 'background-images');
    $this->add_image_to_customizer($wp_customize,'Image 4', 'background-images');
    $this->add_image_to_customizer($wp_customize,'Image 5', 'background-images');

    register_nav_menus( 
    	array(
				'footer_menu' => 'Footer Nav',
				'menu_menu' => 'Menu Nav',
				'full_menu_menu' => 'Full Menu Nav'
			)
		);
  }

	function add_image_to_customizer($wp_customize,$setting_name, $section = 'red-rock', $default = "") {
		$slug = sanitize_title($setting_name);
		$wp_customize->add_setting($slug, 
			array(
					'default'           => $default,
					'capability'        => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, "{$slug}-setting", array(
					'label'    => __($setting_name, 'red-rock-2016'),
					'section'  => $section,
					'settings' => $slug,
		)));
		$wp_customize->get_setting($slug)->transport = 'postMessage';
	}
	
	function add_text_to_customizer($wp_customize,$setting_name, $section = 'red-rock', $default = "") {
		$slug = sanitize_title($setting_name);
		$wp_customize->add_setting($slug, 
			array(
					'default'           => $default,
					'capability'        => 'edit_theme_options'
			)
		);
		$wp_customize->add_control( new WP_Customize_Control($wp_customize, "{$slug}-setting", array(
					'label'    => __($setting_name, 'red-rock-2016'),
					'section'  => $section,
					'settings' => $slug,
		)));

		//$wp_customize->get_setting($slug)->transport = 'postMessage';
	}


	function add_page_to_customizer($wp_customize, $setting_name, $section = 'red-rock', $default = ""){
		$slug = sanitize_title($setting_name);
		$wp_customize->add_setting($slug,
                        array(
                                        'default'           => $default,
                                        'capability'        => 'edit_theme_options'
                        )
                );
		$wp_customize->add_control('themename_page_test', array(
        		'label'      => __($setting_name, 'red-rock-2016'),
        		'section'    => $section,
        		'type'    => 'dropdown-pages',
        		'settings'   => $slug,
    		));
	}

	function add_banner_to_customizer(){
		
	}


}

$red_rock_style = new RedRockStyle();


?>
