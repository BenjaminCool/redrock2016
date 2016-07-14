<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
	<?php wp_head(); 	
	
  	global $post;
    $slug = get_post( $post )->post_name;

    $menu = wp_nav_menu(array('echo'=>false));
    $home_class = $menu_class = $cating_class = $events_class = $beer_class = $employment_class = "menu-item menu-item-type-post_type menu-item-object-page ";
    $selected_class =  'menu-item menu-item-type-post_type menu-item-object-page current-menu-item current_page_item page_item ';
	  switch($slug){
	    case 'red-rock-home':
	      $home_class = $selected_class;
	      break;
	    case 'menu':
	      $menu_class = $selected_class;
	      break;
	    case 'catering':
	      $catering_class = $selected_class;
	      break;
	    case 'events':
	      $events_class = $selected_class;
	      break;
	    case 'on-tap':
	      $beer_class = $selected_class;
	      break;
	    case 'employment':
	      $employment_class = $selected_class;
	      break;
	  }
	
	
	      $home_url = esc_url(home_url('/'));
              $mods = get_theme_mods();

	?>
	
<meta name="google-site-verification" content="HX4lL8PSx9WWpLaSH0jP5xJUIeZs5Omqtp1NmMHIWp0" />	
	
</head>

<body <?php body_class(); ?>>

<div id="container">



	<header>

<?php
  if( isset($mods['red-rock-campus_banner']) && $mods['red-rock-campus_banner'] != "") {
echo<<<HTML
	<div>
		<img src="{$mods['red-rock-campus_banner']}" style="width:100%;max-width:800px;"/>
	</div>
HTML;
}
?>
            <div id="logo-header">
          
	<?php

		echo '<a href="'.$home_url.'" title="';
		bloginfo('description');
		echo '"><img src="'.$mods['red_rock_logo'].'" alt="';
		bloginfo('name');
		echo '" /></a>';

	?>
            </div>
	  <div class="header" style="box-shadow: 0 2px 2px 0px lightgrey;">

      <div class="header-image"> 
  
        <!--<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /> -->
        <!--<img src="/wp-content/uploads/2015/01/taps-1000x240.jpg" style="margin-left:-30px;margin-top:-30px;height:245px;">-->
  
        
  
        <div class="cleaner">&nbsp;</div>
  
      </div><!-- .wrapper .wrapper-header -->


      <div id="header-menu">
	
	    <?php

	      echo<<<HTML
		    <div class="wrapper wrapper-menu">
    			<nav id="menu-main">

HTML;
/*

echo<<<HTML
              <li class="{$home_class}" ><a title="Red Rock Downtown Barbecue" href="/">Location</a></li>
              <li class="{$menu_class}"><a href="/menu/">Menu</a></li>
              <li class="{$events_class}"><a href="/events/">Happenings</a></li>
              <li style="width:200px">
		&nbsp;
              </li>
              <li class="{$catering_class}"><a href="/catering/">Catering</a></li>
              <li class="{$employment_class}"><a href="/employment/">Employment</a></li>
              <li class="{$beer_class}"><a href="/on-tap/">On Tap</a></li>
            </ul>
  		   </nav><!-- #menu-main -->
HTML;
*/

echo $menu."</nav>";

?>

			   <div class="cleaner">&nbsp;</div>
		
		    </div><!-- .wrapper .wrapper-menu -->

	    </div>
	    
	  </div>
	</header>
