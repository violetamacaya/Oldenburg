<div class="event-block-title">
    <?php echo ipSlot('text', array(
        'default'=> 'Próximos eventos',
        'id' => 'event_title' . ipContent()->getCurrentPage()->getId(),
        'class' => 'event-title',
    )); ?>
</div>
<?php if(isset($eventos) && is_array($eventos)){
    $index=1;
    ?>
    <div data-id='0' class="event-row-0 event-list">
    <?php if (sizeof($eventos) > 1)
        echo '<div class="left-arrow"></div>';
    ?>
    <?php for($i=0; $i<sizeof($eventos); $i++){
        $ts = strtotime($eventos[$i]['date']);
        $months = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre','noviembre', 'diciembre');
        $month = $months[date('n', $ts) -1] ;
        $datestring = date("j", $ts) . ' de '. $month . ' de ' . date("Y", $ts) .' a las ' . date('G', $ts) .':' . date('i', $ts);
        ?>
        <div class="event-item-<?php echo $i;?> event-item" data-id="<?php echo $i; ?>">
            <div class="event-image">
                <?php if($eventos[$i]['image'] != ""):?>
                    <img src="/file/repository/<?php echo esc($eventos[$i]['image']);?>">
                <?php endif; ?>
            </div>
            <div class="event-title">
                <?php echo $eventos[$i]['title']; ?>
            </div>
            <div class="event-date">
                <?php echo $datestring?>
            </div>
            <div class="event-text">
                <?php echo $eventos[$i]['description']; ?>
            </div>
        </div>
        <?php
    }
    if(sizeof($eventos) > 1) : ?>
        <div class="right-arrow"></div>
        <div class="small-arrows">
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
    <?php endif;
    echo '</div>';
}
else{
    echo '<div class="event-row-0 event-list no-events">No hay eventos programados</div>';
}

?>

<div class="clear"></div>
