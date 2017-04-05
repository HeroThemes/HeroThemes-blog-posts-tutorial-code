<?php

//get the ACF field
$kb_category = get_field('kb_category');  
//if the field has been populated... 
if ( $kb_category ) : 
	//create a custom query looking for this term id 
	$kb_args = array( 'post_type' => 'ht_kb',
				'tax_query' => 	array(
						array(
							'taxonomy' => 'ht_kb_category',
							'field' => 'term_id',
							'terms' => $kb_category
						)
					)
				);
	$kb_query = new WP_Query( $kb_args );

	//if there any posts in the query
	if ( $kb_query­->have_posts() ) :
		while ( $kb_query­->have_posts() ) : 
			//setup the post
			$kb_query­->the_post(); 
			//DO STUFF HERE
		endwhile; 
	endif; 
	//reset the post data so we don't mess with the main loop 
	wp_reset_postdata(); 
endif; 