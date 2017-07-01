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
 * Template Name: Page Ofertas
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
                            $args = array(
                              'post_type' => 'oferta',
                              //'order' => 'ASC',
                              'orderby' => array('date' => 'ASC'),
                              'posts_per_page' => 10,
                             /*'tax_query' => array(
                                array(
                                  'taxonomy' => 'product_cat',
                                  'field' => 'slug',
                                  'terms' => 'tour'
                                )
                              )*/
                              
                            );
                            $items = new WP_Query( $args );
                            
                            if( $items->have_posts() ) {
                              while( $items->have_posts() ) {
                                 $items->the_post();
                               
                                ?>

                                    <div class="offers-item">
                                        <div class="offer-info">
                                             <div class="offer-date"><h3>Oferta de empleo publicada</h3> <div><?php echo $post->post_date ?></div></div>
                                            <div class="offer-job"><b>Puesto:</b> <?php echo rwmb_meta( 'rw_of_job');  ?></div>
                                            <div class="offer-vacant"><b>Vacantes Disponibles:</b> <?php echo rwmb_meta( 'rw_of_vacant'); ?></div>
                                            <div class="offer-experience"><b>Experiencia Requerida:</b> <?php echo rwmb_meta( 'rw_of_experience'); ?></div>
                                            <div class="offer-formation"><b>Formación Requerida:</b> <?php echo rwmb_meta( 'rw_of_formation'); ?></div>
                                            <div class="offer-hotel-type"><b>Tipo de Establecimiento:</b> <?php if(rwmb_meta( 'rw_of_hotel_type') == 'c') echo "Hotel de Ciudad"; else echo 'Hotel de Playa'; ?></div>
                                            <div class="offer-country"><b>País:</b> <?php echo rwmb_meta( 'rw_of_country'); ?></div>
                                            <div class="offer-city"><b>Ciudad:</b> <?php echo rwmb_meta( 'rw_of_city'); ?></div>
                                            <div class="offer-salary"><b>Salario:</b> <?php echo rwmb_meta( 'rw_of_salary_currency'); ?><?php echo rwmb_meta( 'rw_of_salary'); ?></div>
                                            <div class="offer-incorporation"><b>Incorporación:</b> <?php echo rwmb_meta( 'rw_of_incorporation'); ?></div>
                                            <div class="offer-requirements"><b>Otros Requisitos:</b> <?php echo rwmb_meta( 'rw_of_other_requirements'); ?></div>
                                            <?php /*echo rwmb_meta( 'rw_of_date'); */?>
                                        </div>
                                        <div class="offer-footer">
                                             <div class="offer-reference"><b>Número de referencia:</b> <?php echo rwmb_meta( 'rw_of_reference'); ?></div>
                                             <a href="<?php echo esc_url( home_url( '/aplicar?of='.rwmb_meta( 'rw_of_reference') ) ); ?>" class="btn btn-blue btn-small">Aplicar</a>
                                              
             
                                        </div>
                                       
                                        
                                        
                                    </div>
                                     
                                
                                 
                                  
                                <?php
                               
                                 
                              }
                            }
                              
                          ?>
                </div>
            </div>
       

        <!-- END OF FORM -->
		</div><!-- #main -->
	</section><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
