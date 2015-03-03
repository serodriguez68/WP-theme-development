<!-- Esta página muestra el portafolio apoyado en content-portfolio.php -->

<?php 
/* 
  Template Name: Portfolio Page
*/
?>
<?php get_header(); ?>

<!-- Esta parte muestra el contenido del static page Portfolio -->
  <!-- El WP loop recorre todos los posts asociados al custom page porfolio (debería ser solo uno) -->
<section class="row">
  <div class="small-12 columns text-center">
    <div class="leader">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
      <h1><?php the_title(); ?></h1>            
      <?php the_content(); ?>
	
  	<?php endwhile; endif; ?>
    
    </div>
  </div>
</section>
<!-- Fin del contenido del static page portfolio -->

<!-- Acá inicia el código que muestra las imágenes de cada post de tipo portafolio (cada entrada del portafolio) -->
  <!-- Originalmente el wp_query iba acá.  Después se migró hacia content-portfolio.php porque también se utiliza en front-page.php -->
  <!-- get_template_part() es un php inlcude al que le podemos pasar como parámetros el nombre de lo que queremos llamar y el genera el link -->
  <!-- en este caso llama al archivo content-portfolio.php -->
<?php get_template_part('content', 'portfolio'); ?>
<!-- Fin del código que muestra las imágenes de cada entrada del porfolio -->

<?php get_footer(); ?>