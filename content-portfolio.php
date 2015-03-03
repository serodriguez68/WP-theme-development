<!-- Recorre todos los posts de tipo portfolio y general el html para mostrarlos.  Esto se usa en page-portfolio.php y en front-page.php  -->

<?php 
  
  // Eso es una forma shorthand de un if (ver conditional tags en codex)
    // Se es la frontpage asigne 4 (limita a 4), d.l.c no limite
    //  is_font_page() es una función de WP que devuelve true si estoy en la front page
  $num_posts = ( is_front_page() ) ? 4 : -1;

// Array de argumentos para el query
    // 'post_type' indica el tipo de custom post type que queremos que el query recoja.
    // 'posts_per_page' limita el alcance del wp_Query. -1 recorre todos los posts, cualquier número positivo lo limita a ese número
  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => $num_posts
  );

  // Recoje como objetos todos los posts que cumplen con los argumentos de $args
  $query = new WP_Query( $args );

?>


<section class="row no-max pad">
  
  <!-- Recorre todos los objetos que se encuentran en en el objeto $query -->
  <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

  <div class="small-6 medium-4 large-3 columns grid-item">
    <!-- the_permalinck() devuelve la url del post específico -->
    <!-- the_post_thumbnail() inserta el tag de imágen con el src y el alt adecuados. Ver codex para parámetros -->
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
  </div>
<!-- wp_reset_psotdata() resetea el objeto de $query para poder usar múltiples loops en una página sin generar conficto -->
  <?php endwhile; endif; wp_reset_postdata(); ?>

</section>
