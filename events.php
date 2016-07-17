<?php
/*
Template Name: Events
*/

class RedRockEventsTemplate {

  function show_events() {
    get_header();
    echo<<<HTML

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="rr_box_02 container-fluid">
					<div class="col-xs-12">

                            

HTML;
      
      			$this->output_events();

echo<<<HTML

                                

					</div>
				</div><!--/.container-fluid -->
			</div>
		</div> 


HTML;
    get_footer();
  }
  
  private function output_events(){
  	$mods = get_theme_mods();
		$args = array (
		 'post_type' => 'events',
		 'post_status' => 'publish',
		 'paged' => false,
		 'posts_per_page' => 9
		);
		$wp_query = new WP_Query($args); 
		$i=0;
		if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					$name = the_title( '', '', false );
					$link = get_permalink();
					$custom = get_post_custom();
					
					$date = new DateTime($custom['event_date'][0]);
					$date = $date->format('M d, Y');
					if(isset($custom['recurring'][0]) && $custom['recurring'][0] != 'Not Recurring'){
							$date = "<span>Every {$custom['recurring'][0]}</span>";
					}

					if($i%3 == 0){
						if($i != 0){
							echo '</div>';
						}
						echo '<div class="row">';
					}
						
					echo<<<HTML
					
					<div class="col-xs-4">
						<div class="eventbox01">
							<div class="event_title"><a href="{$link}" rel="bookmark" title="{$name}">{$name}</a></div>
							<div class="event_date">{$date}</div>
						</div>
					</div>
								
HTML;
					$i++;
				}
				echo "</div>";
		}
  }
  
}

$redrockevents = new RedRockEventsTemplate();
$redrockevents->show_events();

?>
