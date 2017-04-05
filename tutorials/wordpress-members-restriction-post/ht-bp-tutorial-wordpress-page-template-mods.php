<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
	    <?php 
			//loop start
			while ( have_posts() ) : the_post(); 
				//include the page content template. 
				get_template_part( 'template-parts/content', 'page' ); 

				//check and load the woo_knowledge_base_content
				if( function_exists( 'woo_knowledge_base_content' ) ){
					echo woo_knowledge_base_content();
				} else {
					echo 'function woo_knowledge_base_content() missing';
				}
				 
				//load comment template
				 if ( comments_open() || get_comments_number() ) { 
				 	comments_template(); 
				 } //loop end 
			 endwhile; 
		?>
 
	</main><!-- .site-main -->
		<?php get_sidebar( 'content-bottom' ); ?>
 
</div> <!-- .content-area -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>