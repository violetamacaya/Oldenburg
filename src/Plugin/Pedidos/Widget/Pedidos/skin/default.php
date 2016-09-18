<div class="pedidos-wrapper">

    <div class="pedidos-contenido">
        <div class="pedidos_block_title">
            Pedidos
            <div class="bar_separator"></div>
        </div>
        <div class="col-md-6 ">
            <div class="left">
                <div class="advertencia"> QUEDA TERMINANTEMENTE PROHIBIDA LA VENTA DE BEBIDAS ALCOHÓLICAS A MENORES DE 18 AÑOS.</div>
                <ul>
                    <li>Gran variedad de cervezas para llevar, a precios de tienda muy reducidos</li>
                    <li>Tenemos todas las referencias de nuestra carta habitual más alguna cerveza "especial" para sorprender a nuestros clientes</li>
                    <li>Recogida en el local (horario de 13h a 16h y 19h a 00h)</li>
                    <li>Sin límite de unidades (si fueran más de seis unidades aconsejamos llamar al número <a href="tel:+34914482341">914.48.23.41</a> y reservar)</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <?php $sql = 'SELECT `link` FROM ip_carta WHERE id = 9';
            $carta = ipDb()->fetchValue($sql);
            ?>

            <a class="consultaCartaBg" target="_blank" href="http://oldenburg.dev/file/repository/Carta_Oldenburg_2015_20151110.pdf"><img src="<?php echo ipThemeUrl('img/carta.jpg'); ?>" </a>
            <a class="consultaCarta" target="_blank" href="http://oldenburg.dev/file/repository/Carta_Oldenburg_2015_20151110.pdf">Consultar la carta</a>
        </div>
    </div>


</div>