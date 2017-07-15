jQuery(function($) {
	"use strict";
	// Author Code Here

	var owlPricing;
	var ratio = 2;

	translateAccountProfile();

	function translateAccountProfile() {
		if($('html').attr('lang') == 'es-ES')
		{
			$('.um-page-account').find('.entry-title').text('Cuenta');
			$('.um-page-login').find('.entry-title').text('Iniciar Sesión');
			$('.um-page-password-reset').find('.entry-title').text('Cambio de Contraseña');
			
			var accountSection = $('.um-account');
			var profileSection = $('.um-profile');
			var loginSection = $('.um-login');
			var passwordSection = $('.um-password');
			//tabs
			accountSection.find('a[data-tab="general"] .um-account-title').text('Cuenta');
			accountSection.find('a[data-tab="password"] .um-account-title').text('Cambiar Contraseña');
			accountSection.find('a[data-tab="privacy"] .um-account-title').text('Privacidad');
			accountSection.find('a[data-tab="curriculum"] .um-account-title').text('Editar Curriculum');
			accountSection.find('a[data-tab="delete"] .um-account-title').text('Eliminar Cuenta');
			//content tabs
			accountSection.find('.um-account-profile-link a').text('Ver Perfil');
			accountSection.find('.um-account-heading').html('<i class="um-faicon-user"></i>Cuenta');
			accountSection.find('label[for="user_login"]').text('Usuario');
			accountSection.find('label[for="first_name"]').text('Nombre');
			accountSection.find('label[for="last_name"]').text('Primer Apellido');
			accountSection.find('label[for="last_name_2"]').text('Segundo Apellido');
			accountSection.find(".um-field-last_name_2").insertAfter(accountSection.find(".um-field-last_name"));
			accountSection.find('label[for="user_email"]').text('Correo');
			accountSection.find('#um_account_submit').val('Actualizar');

			accountSection.find('label[for="current_user_password"]').text('Contraseña Actual');
			accountSection.find('label[for="user_password"]').text('Nueva Contraseña');
			accountSection.find('label[for="confirm_user_password"]').text('Confirmar Contraseña');
			accountSection.find('input[value="Update Password"]').val('Actualizar');

			accountSection.find('label[for="single_user_password"]').text('Contraseña');
			accountSection.find('input[value="Delete Account"]').val('Eliminar');
			accountSection.find('.um-account-tab-delete p').text('¿Seguro que quieres eliminar tu cuenta? Esto borrará todos los datos de su cuenta del sitio. Para eliminar su cuenta, introduzca su contraseña a continuación'); 

			profileSection.find('a:contains("Edit Profile")').text('Editar Perfil');
			profileSection.find('a:contains("My Account")').text('Mi Cuenta');
			profileSection.find('a:contains("Logout")').text('Cerrar Sesión');
			profileSection.find('a:contains("Cancel")').text('Cancelar');
			profileSection.find('a:contains("add")').text('Agregar');
			profileSection.find('.um-profile-note span').text('Su perfil está un poco vacío. ¿Por qué no agregas algo de información?')​;
			profileSection.find('span:contains("About")').text('Acerca');
			profileSection.find('span:contains("Posts")').text('Entradas'); 
			profileSection.find('span:contains("Comments")').text('Comentarios');
			profileSection.find('a:contains("Apply")').text('Aplicar'); 
			profileSection.find('a:contains("Upload photo")').text('Subir Foto'); 
			profileSection.find('input[value="Update Profile"]').val('Actualizar');
			profileSection.find('textarea[placeholder="Tell us a bit about yourself..."]').attr('placeholder','Cuéntanos un poco sobre ti...');
			
			$('.um-own-profile').find('#um_upload_single div:contains("Change your cover photo")').text('Cambia tu foto de portada'); 

			loginSection.find('a:contains("Your account")').text('Tu Cuenta');
			loginSection.find('a:contains("Logout")').text('Cerrar Sesión');
			loginSection.find('a:contains("Forgot your password?")').text('¿Olvidó su contraseña?');

			passwordSection.find('.um-field-password_reset_text div:contains("To reset your password, please enter your email address or username below")').text('Para restablecer su contraseña, ingrese su dirección de correo electrónico o nombre de usuario abajo');
			passwordSection.find('input[placeholder="Enter your username or email"]').attr('placeholder','Ingrese su nombre de usuario o correo electrónico');
			passwordSection.find('input[value="Reset my password"]').val('Cambiar mi contraseña');
			passwordSection.find('p:contains("We have sent you a password reset link to your e-mail. Please check your inbox.")').text('Le hemos enviado un enlace de restablecimiento de contraseña a su correo electrónico. Comprueba tu bandeja de entrada.');
			passwordSection.find('label[for="user_password"]').text('Nueva Contraseña');
			passwordSection.find('label[for="confirm_user_password"]').text('Confirmar Contraseña');
			passwordSection.find('input[value="Change my password"]').val('Cambiar mi contraseña');
			
			

			

			

			
			
		}

	};

	// Window Load
	$(window).load(function() {
		// Preloader
		$('.intro-tables, .parallax, .banner').css('opacity', '0');
		$('.preloader').addClass('animated fadeOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			$('.preloader').hide();
			$('.parallax, .banner').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$('.intro-tables').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
			});
		});

		// Header Init
		if ($(window).height() > $(window).width()) {
			var ratio = $('.parallax').width() / $('.parallax').height();
			$('.parallax img').css('height', ($(window).height()) + 'px');
			$('.parallax img').css('width', $('.parallax').height() * ratio + 'px');
		}

		$('.banner').height($(window).height() + 80);
		$('.banner .item').height($(window).height() + 80);
		$('section .cut').each(function() {
			if ($(this).hasClass('cut-top'))
				$(this).css('border-right-width', $(this).parent().width() + "px");
			else if ($(this).hasClass('cut-bottom'))
				$(this).css('border-left-width', $(this).parent().width() + "px");
		});
		
		// Typing Intro Init
		/*$(".typed").typewriter({
			speed: 60
		});*/

		// Sliders Init
		$('.owl-schedule').owlCarousel({
			//singleItem: true,
			items : 1,
			autoplay : true,
		    loop : true,
			//pagination: true
		});
		$('.owl-ads').owlCarousel({
			//singleItem: true,
			items : 1,
			autoplay : true,
		    loop : true,
			//pagination: true
		});
		$('.owl-testimonials').owlCarousel({
			//singleItem: true,
			items : 1,
			//pagination: true
		});
		$('.owl-twitter').owlCarousel({
			//singleItem: true,
			items : 1,
			//pagination: true
		});

		$(".owl-banner").owlCarousel({
		      animateOut: 'fadeOut',
		      autoplayTimeout: 9000,
		      items : 1,
		      autoplay : true,
		      loop : true,
		      nav : true,
		      navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
		    
		  });

		// Navbar Init
		//$('nav').addClass('original').clone().insertAfter('nav').addClass('navbar-fixed-top').css('position', 'fixed').css('top', '0').css('margin-top', '0').removeClass('original');
		$('.navbar-fixed-top').css('position', 'fixed').css('top', '0').css('margin-top', '0').removeClass('original');
		$('.mobile-nav ul').html($('nav .navbar-nav').html());
		$('nav.navbar-fixed-top .navbar-brand img').attr('src', $('nav.navbar-fixed-top .navbar-brand img').data("active-url"));

		

		// Popup Form Init
		var i = 0;
		var interval = 0.15;
		$('.popup-form .dropdown-menu li').each(function() {
			$(this).css('animation-delay', i + "s");
			i += interval;
		});
		$('.popup-form .dropdown-menu li a').click(function(event) {
			event.preventDefault();
			$(this).parent().parent().prev('button').html($(this).html());
		});

		$(".date").flatpickr({
		      minDate: "today",
		      onChange: function(selectedDates, dateStr, instance) {
		           //$('.filters').find('form').submit();
		        },
		    });

		// Onepage Nav
		/*$('.navbar.navbar-fixed-top .navbar-nav').onePageNav({
			currentClass: 'active',
			changeHash: false,
			scrollSpeed: 400,
			filter: ':not(.btn)'
		});*/
	});
	// Window Scroll
	function onScroll() {
		/*if ($(window).scrollTop() > 50) {
			$('nav.original').css('opacity', '0');
			$('nav.navbar-fixed-top').css('opacity', '1');
	
		} else {
			$('nav.original').css('opacity', '1');
			$('nav.navbar-fixed-top').css('opacity', '0');

		}*/
	}

	window.addEventListener('scroll', onScroll, false);

	// Window Resize
	$(window).resize(function() {
		$('.banner').height($(window).height());
	});
	var $menu = $('.navbar-nav');
	$menu.find(".menu-item-has-children").hoverIntent({
      over: function() {
            $(this).find(">.sub-menu").slideDown(200 );
          },
      out:  function() {
            $(this).find(">.sub-menu").slideUp(200);
          },
      timeout: 200

       });

	// Pricing Box Click Event
	$('.pricing .box-main').click(function() {
		$('.pricing .box-main').removeClass('active');
		$('.pricing .box-second').removeClass('active');
		$(this).addClass('active');
		$(this).next($('.box-second')).addClass('active');
		$('#pricing').css("background-image", "url(" + $(this).data('img') + ")");
		$('#pricing').css("background-size", "cover");
	});

	// Mobile Nav
	$('body').on('click', 'nav .navbar-toggle', function() {
		event.stopPropagation();
		$('.mobile-nav').addClass('active');
	});

	$('body').on('click', '.mobile-nav a', function(event) {
		$('.mobile-nav').removeClass('active');
		if(!this.hash) return;
		event.preventDefault();
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			event.stopPropagation();
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});

	$('body').on('click', '.mobile-nav a.close-link', function(event) {
		$('.mobile-nav').removeClass('active');
		event.preventDefault();
	});

	/*$('body').on('click', 'nav.original .navbar-nav a:not([data-toggle])', function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			event.stopPropagation();
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});*/

	function centerModal() {
		$(this).css('display', 'block');
		var $dialog = $(this).find(".modal-dialog"),
			offset = ($(window).height() - $dialog.height()) / 2,
			bottomMargin = parseInt($dialog.css('marginBottom'), 10);

		// Make sure you don't hide the top part of the modal w/ a negative margin
		// if it's longer than the screen height, and keep the margin equal to 
		// the bottom margin of the modal
		if (offset < bottomMargin) offset = bottomMargin;
		$dialog.css("margin-top", offset);
	}

	$('.modal').on('show.bs.modal', centerModal);

	$('.modal-popup .close-link').click(function(event){
		event.preventDefault();
		$('#modal1').modal('hide');
	});

	$(window).on("resize", function() {
		$('.modal:visible').each(centerModal);
	});

	$('.remove-file').click(function(event){
		event.preventDefault();
		  
		  var cv = $(this).data('cv');
		  var id = $(this).data('id');
		  var nonce = $(this).data('nonce');
		  var button =  $(this);
		  $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php?action=delete_file&post_id=' + cv + '&id=' + id + '&nonce=' + nonce,
            //data: { file : $(this).data('id')},
            success: function (resp) {
            	
                 console.log(resp)
                 if(resp == 'success')
                 	button.parent('li').remove();
                 //	 $('.files-list').find('li[data-id="'+ cv +'"]').remove();
              
                
            },
            error: function () {
              console.log('error eliminado archivo');

            }
        });
	});

	$('.remove-cv').click(function(event){
		event.preventDefault();
		  
		 
		  var id = $(this).data('id');
		  var nonce = $(this).data('nonce');
		  var button =  $(this);
		  $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php?action=delete_cv&id=' + id + '&nonce=' + nonce,
            //data: { file : $(this).data('id')},
            success: function (resp) {
            	
                 console.log(resp)
                 if(resp == 'success'){

                 	$('.account-curriculum-edit').html('<p>Curriculum eliminado correctamente!</p>')
                 }
                 
                
            },
            error: function () {
              console.log('error eliminado archivo');

            }
        });
	});
});
