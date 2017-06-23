<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotelsolutions
 */

get_header(); ?>

	<section class="banner-section">
	    
	    
	        <?php if ( has_post_thumbnail() ) :

		  	 	$id = get_post_thumbnail_id($post->ID);
		  	 	$thumb_url = wp_get_attachment_image_src($id,'full', true);
		  	 	?>
		    	
		    	 <div class="slide" style="background-image: url('<?php echo $thumb_url[0] ?>');">
	            
		               
		            
		        </div>
				
			
			

	        <?php endif; ?>
	       

	</section>


	<section class="main">
		<div class="container">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
	</section>
		
<?php
/*get_sidebar();*/
get_footer();
