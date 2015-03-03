<!-- Este archivo sirve como template de la página home del blog (no confundir con el front page del site) -->

<?php get_header(); ?>

<section class="two-column row no-max pad">
  <div class="small-12 columns">
    <div class="row">
      <!-- Primary Column -->
      <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
        <div class="primary">
    
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <!-- post_class: hace que WP outputs como clase una cantidad de información importante del post. Esto lo podemos usar para el CSS -->
                <!-- Adicional a esto, se estamos diciendo que también incluya la clase 'post' en su output -->
              <article <?php post_class('post'); ?>>
                <!-- the_permalink() introduce la url para llevar al post individual -->
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <!-- get_the_excerpt() es similar a the_content() solo que corta el contenido en cierto punto, solo muestra un pedazo del artículo -->
                  <!-- the utiliza echo strip_tags( get_the_excerpt()) en lugar de the_exceprt() por las siguientes razones:-->
                    <!-- 1. the_expert() devuleve el experpt rodeado de tags <p> que interfieren con nuestro estilo pues queda un <p> dentro de un <h2> -->
                    <!-- 2. para quitar los tags <p> utilizamos la funicón de php strip_tags. Para que la funicón funcione, necesitmaos pasar el objeto con get_the_expert() y no el echo con the_exerpt()-->
                    <!-- 3. después de quitar los tags, tenemos que echo out el resultado -->
                <h2><?php echo strip_tags( get_the_excerpt() ); ?></h2>
                <ul class="post-meta no-bullet">
                  <li class="author">
                    <!-- "avatar" es una clase utilizada por WP y entra en conflico con nuestro css.  Cambiar a wpt-avatar para nuestro css -->
                      <span class="wpt-avatar small">
                        <!-- Trae el avatar del autor utilizando el ID del autor y el tamaño del avatar (hay más posibles parámetros) -->
                          <!-- se utiliza echo porque es una función get_ y no the_ -->
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 24 ); ?>
                      </span> 
                      <!-- the_author_posts_link() crea un link a una página con los artículos de esea autor.  El template de dicha página será archive.php -->
                      by <?php the_author_posts_link(); ?>                    
                  </li>
                  <!-- the_category() crea links a todas las categorías | la , es el separador a utilizar entre categorías -->
                    <!-- usar un separador previene que the_category output dentro de un <ul> -->
                  <li class="cat">in <?php the_category( ', ' ); ?></li>
                  <!-- Muestra la fecha de publicación -->
                    <!-- the_date() solo muestra la fecha para un post de todos los que se publican en la misma fecha.  Por esu usamos the_time() -->
                  <li class="date">on <?php the_time('F j, Y'); ?></li>
                </ul>
                <!-- Si hay post thumbnail (featured image), mostrar el thumblail, si no, ignorar -->
                <?php if( get_the_post_thumbnail() ) : ?>
                <div class="img-container">
                  <?php the_post_thumbnail('large'); ?>
                </div>  
                <?php endif; ?>          	
              </article>
     
            <!-- Pagination funcitons -->
              <!-- Requeridas por WP para mostar un número de posts establecido en el Admin area por página -->
			     <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
          <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

			<?php endwhile; else : ?>
			
			  <p><?php _e( 'Sorry, no pages found.' ); ?></p>
			
			<?php endif; ?>
    
		</div>
	  </div>
	
	  <?php get_sidebar(); ?>

  </div>
</section>





<?php get_footer(); ?>