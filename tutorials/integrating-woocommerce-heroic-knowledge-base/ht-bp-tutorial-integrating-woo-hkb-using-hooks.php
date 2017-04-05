<?php

if ( ! defined( 'ABSPATH' ) ) exit;


/**
* Add an new tab
*/
add_filter( 'woocommerce_product_tabs', 'woo_knowledge_base_tab' );

function woo_knowledge_base_tab( $tabs ) {
	//Add the new tab for our Knowledge Base Tab
	$tabs['faqs_tab'] = array(
		'title' => __( 'FAQs', 'woocommerce' ),
		'priority' => 50,
		'callback' => 'woo_knowledge_base_tab_content'
	);
	return $tabs;
}

/**
* The new tab content
*/
function woo_knowledge_base_content() {
	global $post;
	//Get the taxonomy field
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
				?> 
					<li class="hkb-­article­-list__<?php hkb_post_format_class($post­->ID); ?>">
						<a href="<?php echo get_permalink(); ?>" rel="bookmark">
							<?php echo get_the_title(); ?>
						</a>
					</li>
				<?php
			endwhile; 
		endif; 
		//reset the post data so we don't mess with the main loop 
		wp_reset_postdata(); 
	endif; 
}

