<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>






	<div class="container-fluid rodape bgcolor1 nopad">
		<div class="container half-row2">
			<div class="col-md-4">
					<div class="col-md-11 center-block half-bot text-center">				
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img class="img-responsive logo center-block" src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'description') ); ?>"></a>
					
					<h4 class="ttitle bolder text-center"><?php echo esc_attr( get_bloginfo( 'description') ); ?></h4>
					</div>
				
			</div>		
			<div class="col-md-4">
			<h3 class="ttitle bluetitle half-row"> <i class="fas fa-map-marker-alt"></i>  Endereço</h3>
			<div class="antop2"></div>
			
    <p>Rua C-137 (Esquina com a C-143) nº 1112<br> Qd. 302 Lt.12- Jardim América <br> Goiânia/Goiás
    CEP 74275-060<p>
			<a href="https://maps.app.goo.gl/LBn2u3C5MD9L6gYv7" target="_blank" class="btn-primary btn-sm"><i class="fas fa-map-marker-alt"></i> como chegar</a>
			</div>

			<div class="col-md-4">
			<h3 class="half-row"><i class="fas fa-envelope-open"></i> Contato</h3>
				<div class="antop2"></div>	
				<p class="twhite"><i class="fas fa-phone-square-alt"></i> Fixo : (62) 3110 5757</p>						
				<p class="twhite"><i class="fas fa-phone-square-alt"></i> Nacional: 0800 717 7772 </p>
				<p class="twhite"><i class="fab fa-whatsapp"></i> (62) 99610 7777</p>
				<p class="twhite"><i class="fab fa-whatsapp"></i> (11) 97533 5757</p>
				<p><i class="far fa-envelope-open"></i> atntecnologiabrasil@gmail.com</p>
			</div>


		</div><!-- .container -->

		<div class="container half-row2">
			<div class="row">							
			<div class="col-md-12 text-center nopad">
					<p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> - <?php _e( 'All rights reserved', 'odin' ); ?></p>
				</div>
			</div>
		</div>

	</div><!-- #footer -->
	<div class="antop"></div>
	<div class="antop"></div>






	<?php wp_footer(); ?>
</body>
</html>
