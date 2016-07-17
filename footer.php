<?php
	$mods = get_theme_mods();
?>
		<footer class="footer " style="position: relative;">

            <div class="footcenter">
        
        <p class="adressphone">  <img alt="location" src="<?php echo $mods['footer-location-icon'];  ?>">
                 <?php echo $mods['footer-location-text'];  ?>
        </p>
        
        <p class="footbut">
        <?php
        		$locations = get_nav_menu_locations();
        
        		$footer_nav_items = wp_get_nav_menu_items( $locations['footer_menu']);
						foreach($footer_nav_items as $item){
							echo "<a href=\"{$item->url}\">{$item->title}</a>";
						}
        
//        	var_dump($footer_nav_items);
        ?>
        </p>      
        
        
                 
                 
        </div>
     
    </footer>
      
		<?php wp_footer(); ?>
    
  </body>
</html>