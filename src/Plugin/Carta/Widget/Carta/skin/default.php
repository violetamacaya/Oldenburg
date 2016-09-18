<div id="cartas-pdf" class="container">
    <?php echo ipSlot('text', array(
        'default'=> 'Carta',
        'id' => 'carta_title' . ipContent()->getCurrentPage()->getId(),
        'class' => 'carta-title',
    )); ?>

    <?php echo ipSlot('text', array(
        'default'=> 'La Cerveceria Oldenburg de Madrid, conocida por su Record Guinness, pone a la venta todo tipo de cervezas y comidas vía Web.

				A través de esta página podrás adquirir las tan selectas cervezas que tienes el placer de degustar en el local y por si esto no fuera suficiente, cuentas con la total confianza de más de 25 años de experiencia.

				Además estarás asesorado en todo momento por el maestro cervecero Jose Luis Ramírez y Juan Carlos Cabezón.

				Si tienes alguna duda con tu elección de las cervezas o cualquier otro tema relacionado con ellas, no dudes en ponerte en contacto con ellos.

				En la parte inferior de la página encontrarás todas las cervezas que ofertamos y también podrás descargar la carta completa en formato PDF.',
        'id' => 'carta_text' . ipContent()->getCurrentPage()->getId(),
        'class' => 'carta-text',
    )); ?>

    <div class="slidingDiv-wrapper">
        <?php
        foreach($carta as $key => $categoria) :
            ?>
        <div id="item-<?php echo $categoria['id']; ?>" class="slidingDiv">
            <h3><?php echo $categoria['title']; ?></h3>
            <p></p>
        </div>
        <?php
        endforeach;
        ?>
    </div>

    <div style="display:none" id="cartas-pdf">

        <p style="font-family: 'Lato', sans-serif;  font-weight: 400;  font-style: italic;  font-size: 20px;  color: #888; "> Nuestra carta es extensa y se adapta a cualquier necesidad. </p>

    </div>

    <!-- ============ PLACE ORDER ============= -->
    <ul class="cart-list clearfix">

        <?php
            $pivote = (sizeof($carta)-1)/2;
            for($i=0; $i<sizeof($carta); $i++) :
                $categoria = $carta[$i];
                if($i <= $pivote)
                    $indexItem = $i;
                else if ($i > $pivote){
                    $indexItem = $i - $pivote;
                }

         ?>

        <li class="layer<?php echo $indexItem; if($i == (sizeof($carta)-1)/2 ) echo ' active' ?>" data-div="item-<?php echo $categoria['id']; ?>">
            <a target="_blank" href="/file/repository/<?php echo esc($categoria['link']); ?> "> <img width="235" height="235" src="/file/repository/<?php echo esc($categoria['image']);?>"></a>
        </li>
        <?php endfor; ?>
         </ul>
    <!-- ====================================== -->

