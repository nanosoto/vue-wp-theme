
	<?php wp_footer(); ?>
	<footer class="footer">
				<div class="footer__contact">
					<h1 class="contact__title">¿No encuentras lo que buscas?</h1>
					<p class="contact__description">Rellena el siguiente formulario y cuéntanos qué es lo que necesitas y cómo podemos ayudarte, o si lo prefieres, puedes escribirnos un correo a <a href="mailto:marketing@cic.es">marketing@cic.es</a> o <a href="mailto:diseno@cic.es">diseno@cic.es</a></p>
					<div class="contact__form">
						<div class="form-group contact__nombre">
							<div class="form-group__label">Nombre y apellidos</div>
							<input class="form-group__input" type="text" name="firstname" placeholder="Nombre y apellidos">
							<div class="form-group__helper-text">*Helper text</div>
						</div>
						<div class="form-group contact__email">
							<div class="form-group__label">Email</div>
								<input class="form-group__input" type="text" name="firstname" placeholder="Email">
							<div class="form-group__helper-text"></div>
						</div>
						<div class="form-group form-group-textarea contact__mensaje">
							<div class="form-group__label">Mensaje</div>
							<textarea class="form-group__input form-group__textarea" placeholder="Escribe aquí tu mensaje"></textarea>
							<div class="form-group__helper-text"></div>
						</div>
						<button class="btn contact__button">
							enviar mensaje
							<img class="btn__icon" src="<?php bloginfo('template_directory'); ?>/img/send.svg">
						</button>
					</div>
				</div>
				<div class="footer__bottom">
					<img src="<?php bloginfo('template_directory'); ?>/img/footer__bg.svg" alt="" class="bottom__bg">
					<div class="bottom__info">
						<img src="<?php bloginfo('template_directory'); ?>/img/footer__logo.svg" alt="" class="bottom__info__logo">
						<p class="bottom__info__details">
						CIC Consulting Informático · +34 902 269 017 · marketing@cic.es</br>PCTCAN, Isabel Torres, 3 , 39011 - Santander, España
						</p>
					</div>
					<ul class="bottom__ribbon">
						<li class="ribbon__dark-blue"></li>
						<li class="ribbon__blue"></li>
						<li class="ribbon__cic-blue"></li>
						<li class="ribbon__turquoise"></li>
						<li class="ribbon__green"></li>
					</ul>
				</div>
	</footer>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vanilla-tilt.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
	<script>
		var flkty = new Flickity( '.carousel', {
		  cellAlign: 'left',
		  contain: true,
		  pageDots: false,
		  groupCells: 1
		});
	</script>
</div>
</body>
</html>