<div id="hkb">
	<div class="hkb-­category">
		<h2> Frequently Asked Questions</h2>
		<ul class="hkb-­article­-list">
			<?php 	
				//loop through all of the posts to display the relevent articles 
				while ( $kb_query-­>have_posts() ) : $kb_query-­>the_post(); 
			?>
				<li class="hkb-­article­-list__<?php hkb_post_format_class($post­->ID); ?>">
					<a href="<?php echo get_permalink(); ?>" rel="bookmark">
						<?php echo get_the_title(); ?>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>
		<!--­­ end article list ­­-->
	</div>
</div>