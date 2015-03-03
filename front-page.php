<!-- Sirve como template del front-page del sitio -->
<?php get_header(); ?>

<section class="row">
  <div class="small-12 columns text-center">
    <div class="leader">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>        

	  <?php endwhile; endif; ?>
    
    </div>
  </div>
</section>

<!-- Como el cóidgo que va acá se utiliza acá y en  page-portfolio.php (DRY)-->
	<!-- get_template_part() es un php inlcude al que le podemos pasar como parámetros el nombre de lo que queremos llamar y el genera el link -->
	<!-- en este caso llama al archivo content-portfolio.php -->
<?php get_template_part('content', 'portfolio'); ?>

<?php get_footer(); ?>