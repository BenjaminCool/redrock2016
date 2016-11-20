<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>

  <meta name="google-site-verification" content="HX4lL8PSx9WWpLaSH0jP5xJUIeZs5Omqtp1NmMHIWp0" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php 
  $mods = get_theme_mods();
  $home_url = esc_url(home_url('/'));
  
 $background_id = rand(1,5);
 $background_image = $mods["image-{$background_id}"];
 
?>




  <body <?php body_class(); ?> >
      


			<?php
				$theme_folder = get_stylesheet_directory_uri();
				echo "
					<style type=\"text/css\">
						body {
							background: url({$theme_folder}/img/back/img_back_black.svg) center center no-repeat fixed, url({$background_image}) center center no-repeat fixed;
							background-size: cover;
					    line-height: 1.12;
						}
					</style>
				
				";
				
				if( isset($mods['global-banner']) && $mods['global-banner'] != "") {
					echo "
							<div>
											<img src=\"{$mods['global-banner']}\" style=\"width:100%;max-width:800px;\"/>
							</div>
					";
				}
			?>
			<div class="row" id="menuback">
				
				<div class="col-xs-12 col-lg-10 col-lg-offset-1 col-xl-8 col-xl-offset-2">
				 
					<div class="col-md-5">
							 <?php

								echo '<a href="'.$home_url.'" title="';
								bloginfo('description');
								echo '"><img class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-12" src="'.$mods['red-rock-logo'].'" alt="';
								bloginfo('name');
								echo '" /></a>';

							?>
					</div>
					
					<div class="col-md-7">
														
					<nav class="navbar navbar-inverse bg ">
						<div class="container-fluid">
							<div class="navbar-header">
		 
			
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
	 
							</div>
		
							<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'nav navbar-nav',
										'container_class'=> 'navbar-collapse collapse',
										'container_id' => 'navbar',
										'link_before' => '&#x2605; '
									 ) );
							?>
		
						</div><!--/.container-fluid -->
					</nav>
					</div>
				</div>
				
			</div>

				


