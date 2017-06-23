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
 * Template Name: Page Home
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
                                    <h1 class="white typed">Somos una Empresa de Soluciones integrales estratégicamente estructurada  para suplir las necesidades del sector turístico hotelero</h1>
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
                                    <h1 class="white">Asesorías de Gestión y Servicio<br>
                                     Reclutamiento y Selección de Personal<br>
                                      Capacitaciones y Certificaciones</h1>
                                    
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
                                    <h1 class="white">Gestión de Proyectos Turísticos<br>
                                     Propiedades para Desarrollos Hoteleros<br>
                                      Plan y Gestión de Expansión y Franquicias</h1>
                                    
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
                                    <h3 class="light white">Espacio Publicitario</h3>
                                    <h1 class="white">Anúnciate en Hotel Solutión. <br>
                                    Teléfono: +506 2665 - 2026<br>
                                    <small>Mail: servicioalcliente@hotelsolutionscr.com</small> </h1>
                                    
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
                            <div class="item">
                                <div class="schedule-row row">
                                    <div class="col-xs-6">
                                        <h5 class="regular white">lorem ipsum</h5>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <h5 class="white">8:30 - 10:00</h5>
                                    </div>
                                </div>
                                <div class="schedule-row row">
                                    <div class="schedule-description white">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem suscipit quos, tenetur veniam natus sit cupiditate debitis voluptates alias, nobis maxime. Sapiente vel incidunt velit soluta labore expedita explicabo assumenda?</p>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="item">
                                <div class="schedule-row row">
                                    <div class="col-xs-6">
                                        <h5 class="regular white">lorem ipsum</h5>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <h5 class="white">8:30 - 10:00</h5>
                                    </div>
                                </div>
                                <div class="schedule-row row">
                                    <div class="schedule-description white">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem suscipit quos, tenetur veniam natus sit cupiditate debitis voluptates alias, nobis maxime. Sapiente vel incidunt velit soluta labore expedita explicabo assumenda?</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="schedule-row row">
                                    <div class="col-xs-6">
                                        <h5 class="regular white">lorem ipsum</h5>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <h5 class="white">8:30 - 10:00</h5>
                                    </div>
                                </div>
                                <div class="schedule-row row">
                                    <div class="schedule-description white">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem suscipit quos, tenetur veniam natus sit cupiditate debitis voluptates alias, nobis maxime. Sapiente vel incidunt velit soluta labore expedita explicabo assumenda?</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-table intro-table-hover">
                        <h5 class="white heading hide-hover">Curriculum</h5>
                        <div class="bottom">
                            <h4 class="white heading small-heading no-margin regular">Registrate Hoy</h4>
                            <h4 class="white heading small-pt">Sube tu curriculum</h4>
                            <a href="<?php echo esc_url( home_url( '/oferta-y-empleo' ) ); ?>" class="btn btn-white-fill expand">Registro</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-table intro-table-third">
                        <h5 class="white heading">Clientes Satisfechos</h5>
                        <div class="owl-carousel owl-testimonials bottom">
                            <div class="item">
                                <h4 class="white heading content">I couldn't be more happy with the results!</h4>
                                <h5 class="white heading light author">Adam Jordan</h5>
                            </div>
                            <div class="item">
                                <h4 class="white heading content">I can't believe how much better I feel!</h4>
                                <h5 class="white heading light author">Greg Pardon</h5>
                            </div>
                            <div class="item">
                                <h4 class="white heading content">Incredible transformation and I feel so healthy!</h4>
                                <h5 class="white heading light author">Christina Goldman</h5>
                            </div>
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
                        <h4 class="heading">Consultorías y Asesorías</h4>
                        <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.
                        
                        </p>
                        <button  class="btn btn-blue btn-small">Ver más</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-users"></i>
                        </div>
                        <h4 class="heading">Capitación de Talento Humano</h4>
                        <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                        <a  href="<?php echo esc_url( home_url( '/capacitacion' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-money"></i>
                        </div>
                        <h4 class="heading">Inversión Desarrollos</h4>
                        <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                        <a href="<?php echo esc_url( home_url( '/plan-de-inversion-desarrollos-turistico' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="row services">
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h4 class="heading">Oferta y Empleo</h4>
                        <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                        <a  href="<?php echo esc_url( home_url( '/oferta-y-empleo' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-building"></i>
                        </div>
                        <h4 class="heading">Soluciones Hoteleras</h4>
                        <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                        <a  href="<?php echo esc_url( home_url( '/soluciones-hoteleres' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service">
                        <div class="icon-holder">
                            <i class="fa fa-user"></i>
                        </div>
                        <h4 class="heading">Reclutamiento</h4>
                        <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
                        <a  href="<?php echo esc_url( home_url( '/reclutamiento' ) ); ?>" class="btn btn-blue btn-small">Ver más</a>
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
                        <div class="item text-center">
                            <i class="icon fa fa-twitter"></i>
                            <h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
                            <h4 class="light-white light">#health #training #exercise</h4>
                        </div>
                        <div class="item text-center">
                            <i class="icon fa fa-twitter"></i>
                            <h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
                            <h4 class="light-white light">#health #training #exercise</h4>
                        </div>
                        <div class="item text-center">
                            <i class="icon fa fa-twitter"></i>
                            <h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
                            <h4 class="light-white light">#health #training #exercise</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
/*get_sidebar();*/
get_footer();
