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

	<section class="banner">
        <div class="owl-carousel owl-banner">
          <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/header.jpg');">
                <div class="container">
                    <div class="table">
                        <div class="header-text">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="light white">Hotel Solutions</h3>
                                    <h1 class="white typed">Una empresa de Soluciones integrales orientada al sector turístico hotelero</h1>
                                    <span class="typed-cursor">|</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/header2.jpg');">
                <div class="container">
                    <div class="table">
                        <div class="header-text">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="light white">Soluciones Hoteleras</h3>
                                    <h1 class="white">Asesorías, Reclutamiento de Personal, Capacitaciones y Outsourcing</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/header3.jpg');">
                <div class="container">
                    <div class="table">
                        <div class="header-text">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="light white">Plan de Inversión & Desarrollo</h3>
                                    <h1 class="white">Gestión de Proyectos Turísticos Plan de Expansión y Franquicias</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/header4.jpg');">
                <div class="container">
                    <div class="table">
                        <div class="header-text">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="light white">Capacitación</h3>
                                    <h1 class="white">Servicio al Cliente, Calidad, Liderazgo, Medioambiente y más…</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
              
        </div>

    </section>

    <section class="colorBoxes">
        <div class="cut cut-top"></div>
        <div class="container">
            <div class="row intro-tables">
                <div class="col-md-4">
                    <div class="intro-table intro-table-first">
                        <h5 class="white heading">Eventos</h5>
                        <div class="owl-carousel owl-schedule bottom">
                             <?php
                            $args = array(
                              'post_type' => 'evento',
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

                                    <div class="item">
                                        <div class="schedule-row row">
                                            <div class="col-xs-6">
                                                <h5 class="regular white"><?php echo rwmb_meta( 'rw_event_date'); ?></h5>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <h5 class="white"><?php echo rwmb_meta( 'rw_event_time_ini'); ?> - <?php echo rwmb_meta( 'rw_event_time_fin'); ?></h5>
                                            </div>
                                        </div>
                                        <div class="schedule-row row">
                                            <div class="schedule-description white">
                                               
                                               <?php the_content(); ?>
                                               
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                     
                                
                                 
                                  
                                <?php
                               
                                 
                              }
                            }
                              
                          ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-table intro-table-hover">
                        <h5 class="white heading">Espacio publicitario</h5>
                        <div class="owl-carousel owl-ads bottom">
                             <?php
                            $args = array(
                              'post_type' => 'publicidad',
                              //'order' => 'ASC',
                              //'orderby' => array('date' => 'ASC'),
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

                                    <div class="item">
                                        
                                        <div class="schedule-row row">
                                            <div class="ad-description white">
                                               
                                                <?php if ( has_post_thumbnail() ) :

                                                  $id = get_post_thumbnail_id($post->ID);
                                                  $thumb_url = wp_get_attachment_image_src($id,'large', true);
                                                  ?>
                                                  
                                               
                                                <div class="publicidad-item-img " style="background-image: url('<?php echo $thumb_url[0] ?>');"> </div>
                                              <?php endif; ?>
                                              <a href="<?php echo rwmb_meta( 'rw_url'); ?>" target="_blank" class="publicidad-link"></a>
                                               
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                     
                                
                                 
                                  
                                <?php
                               
                                 
                              }
                            }
                              
                          ?>

                        </div>
                    </div>
                   
                </div>
                <div class="col-md-4">
                    <div class="intro-table intro-table-third">
                        <h5 class="white heading">Clientes Satisfechos</h5>
                        <div class="owl-carousel owl-testimonials bottom">
                             <?php
                            $args = array(
                              'post_type' => 'testimonio',
                              //'order' => 'ASC',
                              //'orderby' => array('date' => 'ASC'),
                              'posts_per_page' => 3,
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
                                    <div class="item">
                                        <h4 class="white heading content"><?php the_content(); ?></h4>
                                        <h5 class="white heading light author"><?php the_title(); ?></h5>
                                    </div>
                                    
                                
                                <?php
                               
                                 
                              }
                            }
                              
                          ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="section ">
        <div class="container">
            <div class="row text-center title">
                <h2>Servicios</h2>
                <h4 class="light muted">Entre la gama de servicios que ofrecemos se destacan siguientes</h4>
            </div>
            <div class="row services">
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-home"></i>
                        </div>
                        <h4 class="heading">Soluciones Hoteleras</h4>
                        <p class="description">Asesorías de gestión. <br>
                                Capacitaciones y certificaciones.<br>
                                Reclutamiento y selección de personal. <br>
                                Servicio de Outsourcing.

                        
                        </p>
                       <a href="<?php echo esc_url( home_url( '/soluciones-hoteleras' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
               
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-money"></i>
                        </div>
                        <h4 class="heading">Inversión Desarrollos</h4>
                        <p class="description">Gestión de propiedades para desarrollos turísticos. <br>  
                            Régimen de franquicias para hoteles individuales.<br>  
                            Plan de expansión y crecimiento para cadenas hoteleras. <br>  
                            Gestión de compra y venta de hoteles.</p>
                        <a href="<?php echo esc_url( home_url( '/plan-de-inversion-desarrollos-turistico' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-users"></i>
                        </div>
                        <h4 class="heading">Servicios Técnicos de Ingeniería</h4>
                        <p class="description">Anteproyecto y obras civiles. <br> 
                            Remodelaciones y construcciones.<br> 
                            Climatización y automatización. <br> 
                            Mantenimiento técnico y protección incendios.
                            </p>
                        <a  href="<?php echo esc_url( home_url( '/servicios-tecnicos-de-ingenieria' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="row services">
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-edit"></i>
                        </div>
                        <h4 class="heading">Capacitaciones y Certificaciones</h4>
                        <p class="description">Certificaciones en normas internacionales.
                                    Calidad y servicio al cliente. <br>
                                    Higiene y seguridad alimentaria (HACCP).<br>
                                    Liderazgo, comunicación asertiva y trabajo en equipo.<br>
                                    </p>
                        <a  href="<?php echo esc_url( home_url( '/soluciones-hoteleras' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h4 class="heading">Empleos</h4>
                        <p class="description">Regístrate en Hotel Solutión y ten acceso a todas las ofertas de empleo, registra tu CV en nuestra plataforma y duplica la posibilidad de ser elegido, como empresa puedes subir tu oferta sin costo y facilitar la búsqueda.</p>
                        <a  href="<?php echo esc_url( home_url( '/ofertas' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-image"></i>
                        </div>
                        <h4 class="heading">Anúnciate con Nosotros</h4>
                        <p class="description">Hoteles y restaurantes.<br>
                            Suplidores hoteleros.<br>
                            Servicios turísticos.<br>
                            Rent a car. 
                            </p>
                        <a  href="<?php echo esc_url( home_url( '/espacio-publicitario' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="cut cut-bottom"></div>
    </section>

    <section class="section section-padded blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="owl-twitter owl-carousel">
                         <?php
                            $args = array(
                              'post_type' => 'testimonio',
                              //'order' => 'ASC',
                              //'orderby' => array('date' => 'ASC'),
                              'posts_per_page' => 6,
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
                                   
                                     <div class="item text-center">
                                        <i class="icon fa fa-comments"></i>
                                        <h4 class="white light"><?php the_content(); ?></h4>
                                        <h4 class="light-white light"><?php the_title(); ?></h4>
                                    </div>
                                
                                <?php
                               
                                 
                              }
                            }
                              
                          ?>


                        
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
/*get_sidebar();*/
get_footer();
