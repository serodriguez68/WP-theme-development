<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Cambiar el titulo hardcoded por una función que lo asigna dinámicamente -->
      <!-- '|' es qué se imprime a la derecha del title (true indica que se imprima) -->
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

    <!-- Carga todos los enqueque styles y enqueue scripts en este punto con false, así como otras cosas que se hayan indicado para ser cargadas en el head -->
    <!-- Importante de incluir antes de que cierre el head -->
    <?php wp_head(); ?>

  </head>

  <!-- body_class escribe una variedad de clases en el tag body cuando la página es cargada,
      Esto nos permite, entre otras cosas, utilizar una clase en el css para manipular cómo se ve la página
      cuando un usuario está logeado ya que la función escribe la clase logged-in -->
  <body <?php  body_class(); ?>>
    <header class="row no-max pad main">
      <!-- Reemplaza los hardcoded href y <a> por información que entrega la función bloginfo() -->
  <h1><a class='current' href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
  <a href="" class="nav-toggle"><span></span>Menu</a>
  <nav>
    <h1 class="open"><a class='current' href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

    <!-- Inicio de Menu en WP -->
    <?php 
    // $defaults es un arreglo de configuración que le dice a WP cómo queremos que el menú se comporte.  En el codex hay muchos más parámetros configurables.
        // container: por defecto WP rodea el menu con un div, false previene esto
        // theme_location: asocia el lugar del menú con el nombre del menú dado en functions.php
        // menu_class: asigna una clase al primer elemento del menú (el ul en este caso)
            // en este caso se asigna la clase 'no-bullet' de foundation (ver código comentado abajo)
      $defaults = array(
        'container' => false,
        'theme_location'  => 'primary-menu',
        'menu_class'  => 'no-bullet'
      );

      wp_nav_menu( $defaults );

    ?>
    <!-- Fin de menú en WP -->

<!-- ESTE ES EL CÓDIGO ORIGINAL DEL MENÚ ESTÁTICO
    <ul class="no-bullet">
      <li class="current parent"><a class='current' href="index.html">Portfolio</a>
        <ul class="sub-menu">
          <li><a href="item.html">Portfolio Item</a></li>
          <li><a href="item.html">Portfolio Item</a></li>
          <li><a href="item.html">Portfolio Item</a></li>
          <li><a href="item.html">Portfolio Item</a></li>
        </ul>
      </li>
      <li class="parent"><a href="blog.html">Blog</a>
        <ul class="sub-menu">
          <li><a href="single-post.html">Single Post</a></li>
          <li><a href="author.html">Author Page</a></li>
        </ul>
      </li>
      <li><a href="about.html">About</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
 FIN CÓDIGO ORIGINAL DE MENU ESTATICO -->
  </nav>
</header>