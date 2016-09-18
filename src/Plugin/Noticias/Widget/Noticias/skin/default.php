<div class="news-block-title">
    Noticias
    <?php echo ipSlot('text', array(
        'default'=> 'Últimas noticias de la cervecería',
        'id' => 'news_title' . ipContent()->getCurrentPage()->getId(),
        'class' => 'news-title',
    )); ?>
</div>



<?php if(isset($news) && is_array($news)){
    ?>
    <div class="news-list news-row">
    <div class="left-arrow"></div>

    <?php for($i=0; $i<sizeof($news); $i++){
        $ts = strtotime($news[$i]['date']);
        $months = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre','noviembre', 'diciembre');
        $month = $months[date('n', $ts) -1] ;
        $datestring = date("j", $ts) . ' de '. $month . ' de ' . date("Y", $ts);
        $link = ipDb()-> selectAll('page', '*',array('id' => $news[$i]['pid']));
        ?>
        <div class="news-item-<?php echo $i; ?> news-item col-md-4">
            <div class="news-image">
                <?php if($news[$i]['image'] != ""):?>
                    <img src="/file/repository/<?php echo esc($news[$i]['image']);?>">
                <?php endif; ?>
            </div>
            <div class="news-title">
                <?php echo $news[$i]['title']; ?>
            </div>
            <div class="news-date">
                <?php echo $datestring?>
            </div>
            <div class="news-text">
                <?php echo $news[$i]['abstract']; ?>
            </div>
            <div class="link">
                <a data-id="<?php echo $i; ?>" class="button-news">Leer noticia</a>
            </div>
        </div>
        <?php } ?>
        <div class="right-arrow"></div>
        <div class="small-arrows">
            <div class="left-arrow"></div>
            <div class="right-arrow"></div>
        </div>
</div>


    <?php for($i=0; $i<sizeof($news); $i++){
        $ts = strtotime($news[$i]['date']);
        $months = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre','noviembre', 'diciembre');
        $month = $months[date('n', $ts) -1] ;
        $datestring = date("j", $ts) . ' de '. $month . ' de ' . date("Y", $ts);
        ?>
        <div class="layout-new layout-new-<?php echo $i; ?>">
            <div class="x-button"><img src="<?php echo ipThemeUrl('img/back-button.png'); ?>"></div>
            <div class="news-image">
                <?php if($news[$i]['image'] != ""):?>
                    <img src="/file/repository/<?php echo esc($news[$i]['image']);?>">
                <?php endif; ?>
            </div>
            <div class="news-title">
                <?php echo $news[$i]['title']; ?>
            </div>
            <div class="news-date">
                <?php echo $datestring?>
            </div>
            <div class="news-text">
                <?php echo $news[$i]['text']; ?>
            </div>
            <div class="back-button"><a>Volver</a></div>

        </div>
    <?php } ?>
<?php } ?>
<div class="clear"></div>