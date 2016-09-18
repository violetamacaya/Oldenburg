<?php

	echo ipView('includes/header.php')->render();

?>
<div class="layout-home">
	<section name="home" id="home">
		<?php
		echo ipBlock('block')->render();
		?>
	</section>
	<section name="noticias" id="noticias" class="noticias">
		<?php
		echo ipBlock('news')->render();
		?>
	</section>
	<section class="carta" id="carta">
		<?php
			echo ipBlock('carta')->render();
		?>
	</section>
	<section class="eventos" id="eventos">
		<?php
		echo ipBlock('eventos')->render();
		?>
	</section>
	<section class="pedidos" id="pedidos">
		<?php
		echo ipBlock('pedidos')->render();
		?>
	</section>
	<section class="contacto" id="contacto">
		<?php
			echo ipBlock('contacto')->render();
		?>

		<?php
			echo ipBlock('social')->render();
		?>
	</section>


</div>
<?php

	echo ipView('includes/footer.php')->render();
