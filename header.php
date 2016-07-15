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
?>




  <body <?php body_class(); ?> >
      
		<div class="menu_main_redrock container" id="mainrr">

			<?php
				if( isset($mods['global-banner']) && $mods['global-banner'] != "") {
					echo "
							<div>
											<img src=\"{$mods['global-banner']}\" style=\"width:100%;max-width:800px;\"/>
							</div>
					";
				}
			?>
			<div class="row" id="menuback">
				
				<div class="col-sm-6 col-sm-offset-3">
				 
					<div class="branded" >
							 <?php

								echo '<a href="'.$home_url.'" title="';
								bloginfo('description');
								echo '"><img src="'.$mods['red-rock-logo'].'" alt="';
								bloginfo('name');
								echo '" /></a>';

							?>
					</div>
														
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

				


