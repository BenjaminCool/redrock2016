<?php /* Template Name: Full Menu */ ?>

<?php get_header(); 

global $post;
$slug = get_post( $post )->post_name;

$categories = array();
$menu_name = 'full_menu_menu';
 
$menus = array();

if ( ( $locations = get_nav_menu_locations() ) 
	&& isset( $locations[ 'full_menu_menu' ] ) ) {
    	$menu = wp_get_nav_menu_object( $locations[ 'full_menu_menu' ] );
    	$menu_items = wp_get_nav_menu_items($menu->term_id);
    	foreach ( (array) $menu_items as $key => $menu_item ) {
		$menu_type = strtolower($menu_item->attr_title);
			
		$args = array (
				'post_type' => $menu_type,
				'post_status' => 'publish',
				'posts_per_page'=>-1,
				'paged' => false,
			);
			$wp_query = new WP_Query($args);

			$menus[$menu_type] = array('title'=>$menu_item->title, 'items'=>array());

			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					$menus[$menu_type]['items'][] = array(
						"name" => the_title( '', '', false ),
						"link" => get_permalink(),
						"custom" => get_post_custom(),
						"content" => get_the_content()
					);
				}
			}
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
								'theme_location' => 'full_menu_menu',
								'menu_class'     => 'nav navbar-nav',
								'container_class'=> 'navbar-collapse collapse',
								'container_id' => 'navbar2',
								'link_before' => '&#x2605; '
						) 
					);
				
				?>
      	
      			
          				<button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="button-lg">Menu</span>
									</button>
        			</nav>
          
		</div>
	</div>
</div>				
            
              
                         
					
					
			<?php
			foreach($menus as $key=>$menu){

echo "	
<div class=\"row\">
	<a name=\"{$key}\"></a>
  <div class=\"col-sm-8 col-sm-offset-2\">
                <div class=\"rr_box_02 container-fluid\">
			<div class=\"container-fluid\">
        			<div class=\"col-sm-12\">
          				<div class=\"navbar-header center\">
             					<h4>{$menu['title']}</h4>
    					</div>
				</div><!--/.col-sm-12-->

";
				
							foreach((array) $menu['items'] as $i=>$menu_item){
								echo "	
									<div class=\"col-sm-6 col-md-4 rr-menu-item\">
												<h3>{$menu_item['name']}</h3>
												<p>{$menu_item['content']}</p>
									</div>									
								";
							}


			echo "
			</div>
                </div>          
        </div>                          
</div>       
";

			}
			?>            
<?php get_footer(); ?>
