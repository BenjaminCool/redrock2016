<?php
	$mods = get_theme_mods();


	$footer_link = "#";
	if(isset($mods['main-footer-link']) && !empty($mods['main-footer-link'])){
		$footer_link = get_page_link($mods['main-footer-link']);
	}
?>
		<footer class="footer " style="position: relative;">

            <div class="row">
		<div class="col-md-6 col-md-offset-3 text-center"
        
        		<p class="adressphone">
				<a href="<?php echo $footer_link;  ?>" class="nolink" ><img alt="location" src="<?php echo $mods['footer-location-icon'];  ?>">
                 			<?php echo $mods['footer-location-text'];  ?>
        			</a>
			</p>
        	</div>
		<div class="pull-right footbut">
        <?php
        		$locations = get_nav_menu_locations();
        
        		$footer_nav_items = wp_get_nav_menu_items( $locations['footer_menu']);
			foreach($footer_nav_items as $item){
				echo "<a href=\"{$item->url}\">{$item->title}</a>";
			}
        
//        	var_dump($footer_nav_items);
        ?>
		</div>     
        
        
                 
                 
        </div>
     
    </footer>
      
		<?php wp_footer(); ?>
    
  </body>
</html>
