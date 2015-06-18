<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 */
?>
<div class="sidebar">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<div class="recent-services">
				<?php
					$category_id = get_cat_ID( 'Services' );
					$args = array( 'numberposts' => '3', 'category' => $category_id );
					$recent_posts = wp_get_recent_posts( $args );
					$recent_services_title = '<h2><a href="'.get_category_link( $category_id ).'">Recent Services &rtrif;</a></h2>';
					echo $recent_services_title;
					foreach( $recent_posts as $recent ){
						$services = '<p>
										<a href="'.get_permalink($recent["ID"]).'">
											<strong>'.$recent["post_title"].'</strong>
										</a>
											<span class="sidebar-date">'.mysql2date('F j, Y', $recent["post_date"]).'</span>
									</p>';
						echo $services;
					}
				?>
			</div>
			<div class="recent-services">
				<?php

					$event_args = array(
						'post_type'        => 'Event',
						'meta_key'         => 'event-start-date',
						'orderby'          => 'meta_value_num',
						'order'            => 'ASC',
					);
					$upcoming_events = get_posts( $event_args );

					$upcoming_events_title = '<h2><a href="">Upcoming Events &rtrif;</a></h2>';
					echo $upcoming_events_title;

					$i=0;
					foreach( $upcoming_events as $upcoming ){

						if($i==3) break;

						$start = get_post_meta( $upcoming->ID, 'event-start-date', true );
						$now = time();

						if ( $start > $now) {
							$event = '<p>
											<a href="'.get_permalink($upcoming->ID).'">
												<strong>'.$upcoming->post_title.'</strong>
											</a>
												<span class="sidebar-date">'.date('F j, Y', $start).'</span>
										</p>';
							echo $event;
							$i++;
						}
					}
				?>
			</div>
		</div>
</div>