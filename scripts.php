		<div class="gs" style="display:none;position:fixed;bottom:0;right:0; margin: 5px;"><a href="http://gonzalospota.com/" target="_blank" style="color:white!important;">GS</a></div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/foundation.min.js"></script>
		<script src="js/jquery.validate.min.js" defer></script>
		<script src="js/velocity.min.js" defer></script>
		<script>
			$(document).foundation();
			$(document).ready(function() {
				$(window).scroll(function() {
					if($(window).scrollTop() + $(window).height() == $(document).height()) {
						$(".gs").css("display", "block");
					}
					else
						$(".gs").css("display", "none");
				});
				$('.equipos').click(function() {
					var equiposToggle = $('.header-submenu').is(':visible'),
						equiposSlide = equiposToggle ? 'slideUp' : 'slideDown';
					$('.header-submenu').velocity(equiposSlide, 200);
				});
				$('.equipos-mobile').click(function() {
					var equiposMobileToggle = $('.header-submenu-mobile').is(':visible'),
						equiposMobileSlide = equiposMobileToggle ? 'slideUp' : 'slideDown';
					$('.header-submenu-mobile').velocity(equiposMobileSlide, 200);
				});
				var $hamburger = $(".hamburger");
					$hamburger.on("click", function(e) {
						$hamburger.toggleClass("is-active");
						var mobilemenuToggle = $('.header-menu-mobile').is(':visible'),
							mobilemenuSlide = mobilemenuToggle ? 'slideUp' : 'slideDown';
						$('.header-menu-mobile').velocity(mobilemenuSlide, 200);
				});
				if ( $(window).width() <= 680 ) {
					$(".zona").html("Zona Oeste");
				}
				jQuery.validator.setDefaults({
					highlight: function(element) {
						jQuery(element).closest('.form-group').addClass('error');
						
					},
					unhighlight: function(element) {
						jQuery(element).closest('.form-group').removeClass('error');
					},
						errorElement: 'span',
						errorClass: 'error'
					});
				$("#contact-form").validate({
					rules: {
						name: {
							required: true,
							minlength: 2,
							maxlength: 70
						},
						email: {
							required: true,
							email: true
						},
						message: {
							required: true,
							minlength: 5,
							maxlength: 1500
						}
					},
					messages: {
						name: {
							required: "Ingrese su nombre.<br>",
							minlength: "Por favor, ingrese un nombre más largo.<br>",
							maxlength: "Por favor, ingrese un nombre más corto.<br>"
						},
						email: "Ingrese su email.<br>",
						message: {
							required: "Ingrese un mensaje.",
							minlength: "Por favor, ingrese un mensaje más largo.",
							maxlength: "Su mensaje supera el límite de caracteres."
						}
					},
					submitHandler: function(form, e) {
						$.ajax({
							type: "POST",
							url: "contact.php",
							data: $(form).serialize(),
							beforeSend: function(){
								$('.enviar').html(data);
								setTimeout(function() {
									$('.enviar').html('Enviar')
	  							}, 8000);
							},
							success: function(data){
								$('.enviar').html(data);
								setTimeout(function() {
									$('.enviar').html('Enviar')
	  							}, 8000);
							},
							error: function(){
								$('.enviar').html(data);
								setTimeout(function() {
									$('.enviar').html('Enviar')
	  							}, 8000);
							}
						});
					}
				});
			});	
		</script>