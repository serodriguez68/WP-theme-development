<!-- Esta página es el template de la entrada de un solo custom post portfolio -->
	<!-- El nombre sigue el naming convention de WP hierarchy -->
<!-- NO incluir comentario de Template Name -->

<?php get_header(); ?>

<section class="two-column row no-max pad">
  <div class="small-12 columns">
    <div class="row">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <!-- Primary Column -->
      <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
        <div class="primary">
    		<!-- Llama el custom field images -->
    			<!-- Es parte del advanced custom field plugin -->
    		<?php the_field('images'); ?>		      		      
    
		</div>
	  </div>
	
	  <!-- Secondary Column -->
	  <div class="small-12 medium-4 medium-pull-8 columns">
		<div class="secondary">
			
			<h1><?php the_title(); ?></h1>

			<!-- Llama el custom field description -->
    			<!-- Es parte del advanced custom field plugin -->
			<p><?php the_field('description'); ?></p>
		
			<hr>

			<!-- Links para navegar fácil hacia otras zonas de la página -->
				<!-- previous_post_link() - nos lleva al post anterior -->
				<!-- bloginfo('url') devuelve el url del site -->
					<!-- Hay otras técnicas para hacer esto si se queire -->
					<!-- Con esta técnica, si se cambia la estructura del url, se rompe el link -->
				<!-- next_post_link() - nos lleva al siguiente post -->
			<p>
				<?php previous_post_link(); ?> -
				<a href="<?php bloginfo('url'); ?>/portfolio">Back to Portfolio</a> - 
				<?php next_post_link(); ?>
			</p>

		</div>	
	  </div>
	<?php endwhile; endif; ?>
  </div>
</section>





<?php get_footer(); ?>