<!-- función que incluye el archivo header.php -->
<?php get_header(); ?>

<section class="row">
  <div class="small-12 columns text-center">
    <div class="leader">

    <!-- Inicio del WP Loop -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
      <!-- the_title(): función de WP que devuelve el título-->
      <h1><?php the_title(); ?></h1>

      <!-- the_content(): función nativa de WP que devuelve el contenido del post -->
      <p><?php the_content(); ?></p>  
	
  <!-- Lo que ocurre si no hay contenido para post -->
  <?php endwhile; else : ?>

    <!-- El _e() traduce  el mensaje al idioma que se haya configurado en WP (y que el template lo permita)-->
    <!-- El primer argumento es qué se va a mostrar, el segundo argumento es un identificador único para este texto -->
        <!-- Esto se utiliza ya que _e traduce el texto a varios idiomas, entonce necesita un identificador único para saber las equivalencias -->
	  <p><?php _e( 'Sorry, no results found.', 'treehouse-portfolio' ); ?></p>
	
	<!-- Fin del WP Loop -->
  <?php endif; ?>
    
    </div>
  </div>
</section>

<!-- función que incluye el archivo footer.php -->
<?php get_footer(); ?>