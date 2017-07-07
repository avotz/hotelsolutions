<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotelsolutions
 */

?>

<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Nuestra ubicación</h3>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62865.59333724849!2d-84.19390029749523!3d10.008632665242093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0f988fd25715d%3A0x4d0daba965f2db08!2sOficentro+Plaza+Aeropuerto!5e0!3m2!1ses-419!2scr!4v1498247438565" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
					<h5 class="light regular light-white">Oficentro Plaza Futura, 2do. Piso. <br>
					Liberia, Guanacaste, Costa Rica.<br>
					Teléfono: +506 2665-2026<br>
					Mail: servicioalcliente@hotelsolutioncr.com<br>
					</h5>
					
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">Nuestros Horarios <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Lunes a Viernes</h5>
							<h3 class="regular white">8:00am a 12:00m</h3>
							<h3 class="regular white">1:00pm a 5:00pm</h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Sab - Dom</h5>
							<h3 class="regular white">Off</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8 copy">
					<p>&copy; 2017 All Rights Reserved. <a href="http://www.avotz.com/">Avotz</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Contáctenos</h3>
				
				
					 <?php echo do_shortcode('[contact-form-7 id="110" title="Formulario de contacto" html_class="popup-form"]') ?>
					 <div class="modal-content-info">
					 	Teléfono: +506 2665-2026 <br>
						Mail: servicioalcliente@hotelsolutionscr.com <br>
						Oficentro Plaza Futura, Liberia, Guanacaste, Costa Rica.
					 </div>
						


				
			</div>
		</div>
	</div>
<?php wp_footer(); ?>

</body>
</html>
