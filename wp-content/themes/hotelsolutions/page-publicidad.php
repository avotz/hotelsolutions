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
 * Template Name: Page Publicidad
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
            <div class="offers">
                <div class="offers-container">
                     <?php
                          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                         
                  
                         
                            $args = array(
                              'post_type' => 'publicidad',
                              //'order' => 'ASC',
                              'orderby' => array('date' => 'ASC'),
                              'posts_per_page' => 10,
                              'paged' => $paged
                             /*'tax_query' => array(
                                array(
                                  'taxonomy' => 'product_cat',
                                  'field' => 'slug',
                                  'terms' => 'tour'
                                )
                              )*/
                              
                            );
                            $items = new WP_Query( $args );

                             // Pagination fix
                              $temp_query = $wp_query;
                              $wp_query   = NULL;
                              $wp_query   = $items;
                            
                            if( $items->have_posts() ) {
                              while( $items->have_posts() ) {
                                 $items->the_post();
                               
                                ?>

                                    <div class="offers-item">
                                        <?php if ( has_post_thumbnail() ) :

                                                  $id = get_post_thumbnail_id($post->ID);
                                                  $thumb_url = wp_get_attachment_image_src($id,'large', true);
                                                  ?>
                                                  
                                               
                                                <div class="publicidad-item-img " style="background-image: url('<?php echo $thumb_url[0] ?>');"> </div>
                                              <?php endif; ?>
                                              <a href="<?php echo rwmb_meta( 'rw_url'); ?>" target="_blank" class="publicidad-link"></a>
                                       
                                        
                                        
                                    </div>
                                     
                                
                                 
                                  
                                <?php
                               
                                 
                              }
                              
                            }
                              
                          ?>
                </div>
                <?php  the_posts_pagination( array( 'mid_size' => 2 ) ); 
                                wp_reset_postdata();  ?>
            </div>
       

        <!-- END OF FORM -->
		</div><!-- #main -->
	</section><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
