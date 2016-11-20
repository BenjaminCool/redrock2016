<?php /* Template Name: Menu */ ?>

<?php get_header(); 

global $post;
$slug = get_post( $post )->post_name;

$menu_type = 'appetizer';
$slug_parts = explode("-",$slug);
if(count($slug_parts) == 2){
	$menu_type = $slug_parts[0];
}


$args = array (
	'post_type' => $menu_type,
	'post_status' => 'publish',
	'posts_per_page'=>-1,
	'paged' => false,
);
$wp_query = new WP_Query($args);

$menu_items = array();

if ( $wp_query->have_posts() ) {
	while ( $wp_query->have_posts() ) {
		$wp_query->the_post();
		$menu_item = array(
			"name" => the_title( '', '', false ),
			"link" => get_permalink(),
			"custom" => get_post_custom(),
			"content" => get_the_content()
		);
		array_push($menu_items,$menu_item);
	}
}


?>

<div class="row">
  <div class="col-sm-8 col-sm-offset-2">             
		<div class="rr_box_02 container-fluid">
				<nav class="navbar navbar-inverse bg ">
      	<?php
				
					wp_nav_menu(
						array(
								'theme_location' => 'menu_menu',
								'menu_class'     => 'nav navbar-nav',
								'container_class'=> 'navbar-collapse collapse',
								'container_id' => 'navbar2',
								'link_before' => '&#x2605; '
						) 
					);
				
				?>
      	
      			
        			<div class="container-fluid">
          				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
          				<div class="navbar-header">
             					<a class="navbar-brand"><?php echo ucwords($menu_type); ?> Menu</a>
    							</div>
        			</div>
          
				
            
              
        <div class="col-sm-12">
                         
					
					
					<?php
				
						foreach($menu_items as $i=>$menu_item){
							echo "	
								<div class=\"col-sm-6 col-md-4 rr-menu-item\">
											<h3>{$menu_item['name']}</h3>
											<p>{$menu_item['content']}</p>
								</div>									
							";
						}
					?>             
				</div><!--/.col-sm-12 -->
			</div><!--/.container-fluid -->
		</div><!--/.rr_box_02 -->
	</div><!--/.col-sm-6 col-sm-offset-3 -->
</div><!--/.row -->
     
<?php get_footer(); ?>
