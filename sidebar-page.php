<!-- En ese archivo se adiciona el widget area en el sidebar para pages-->

<!-- Secondary Column -->
<div class="small-12 medium-4 medium-pull-8 columns">
<div class="secondary">
	
	<!-- Adiciona el widget area en el sidebar.  Si NO se ha configurado, se muestra el mensaje que está dentro del if -->
	<?php if( !dynamic_sidebar( 'page' ) ): ?>

		<h2 class="module-heading">Sidebar Setup</h2>
		<p>Please add widgets via the admin area!</p>

	<?php endif; ?>


</div>
</div>