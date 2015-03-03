<!-- Este es el template para un single post -->
<?php get_header(); ?>

<section class="two-column row no-max pad">
  <div class="small-12 columns">
    <div class="row">
      <!-- Primary Column -->
      <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
        <div class="primary">
    
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <article class="post">                

                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <ul class="post-meta no-bullet">
                  <li class="author">
	                  <span class="wpt-avatar small">
	                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 24 ); ?>
	                  </span>
	                  by <?php the_author_posts_link(); ?>
                  </li>
                  <li class="cat">in <?php the_category( ', ' ); ?></li>
                  <li class="date">on <?php the_time('F j, Y'); ?></li>
                </ul>    
                <?php if( get_the_post_thumbnail() ) : ?>
                <div class="img-container">
                  <?php the_post_thumbnail('large'); ?>
                </div>  
                <?php endif; ?>   

                <?php the_content(); ?>
                <!-- Inserta toda la maquinaria de comentarios para usuarios logeados y no usuarios -->
                  <!-- cmd+shift+l para usar navegación privada y probar los comentarios como NO logeado -->
                  <!-- Las opciones se modifican en el Admin Area > Settings > Discussion -->
                  <!-- Se puede crear un custom comment template usando comments.php -->
                <?php comments_template(); ?>

              </article>
     
			
			<?php endwhile; else : ?>
			
      <!-- El primer argumento es qué se va a mostrar, el segundo argumento es un identificador único para este texto -->
        <!-- Esto se utiliza ya que _e traduce el texto a varios idiomas, entonce necesita un identificador único para saber las equivalencias -->
			  <p><?php _e( 'Sorry, no posts found.', 'treehouse-portfolio' ); ?></p>
			
			<?php endif; ?>
    
		</div>
	  </div>
	
    <!-- Incluye sidebar.php -->
    <?php get_sidebar(); ?>

  </div>
</section>





<?php get_footer(); ?>