<?php
/*
Template Name: Events
*/

class RedRockEventsTemplate {

  function show_events() {
    get_header();
    echo<<<HTML

		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
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
		$args = array (
		 'post_type' => 'events',
		 'post_status' => 'publish',
		 'paged' => false,
		 'posts_per_page' => 9
		);
		$wp_query = new WP_Query($args); 
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

						
					echo<<<HTML
					
					<div class="eventbox01">
						<div class="event_star">
							<img class="estrellita" alt="star" src="img/star.svg">
						</div>
						<div class="event_title"><a href="{$link}" rel="bookmark" title="{$name}">{$name}</a></div>
								<div class="event_date">{$date}</div>
						</div>
					</div>
								
HTML;
				}
		}
  }
  
}

$redrockevents = new RedRockEventsTemplate();
$redrockevents->show_events();

?>
