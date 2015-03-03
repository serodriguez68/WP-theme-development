    <div class="footer-clear"></div>
<footer class="row no-max pad">           
  <p>Copyright <?php echo date('Y'); ?></p>
<!-- Para efectos didácticos se omitieron los social links -->

</footer>
	<!-- Tells WP that this is the place to output any info that has to be before the closing body tag (e.g javasript) -->
		<!-- Toma la info de wp_enqueue_scripts con argumento true y los pone acá, junto con otras cosas que hayamos indicado -->
  <?php wp_footer(); ?>

  </body>
</html>