// Este es un non-conflict jQuery wrapper que es necesario para trabajar con jQuery y WP
	// Como WP es capáz de trabajar con múltiples framworks de js, es importante decirle que el signo $ significa jQuery
jQuery(document).ready(function($) {

	// Para inicializar foundation. Esto en un template estático típicamente está en el html al final de donde se importan todos los scripts.  Se va así
			// 	<script>
			//   	$(document).foundation();
			// </script>

	$(document).foundation();
	
	$( ".nav-toggle" ).click(function() {
	  $(this).toggleClass("open");
	  $("nav").fadeToggle(100);

	  return false;
	});
});

