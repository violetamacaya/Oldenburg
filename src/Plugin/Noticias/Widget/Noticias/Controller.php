<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Noticias\Widget\Noticias;



class Controller extends \Ip\WidgetController
{
    public function getTitle()
    {
        return "Noticias";
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {
        ipAddJs('assets/move_news.js');
        $sql = "select * from ip_noticias ORDER BY date DESC";
        $data['news'] = ipDb()->fetchAll($sql);
        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

}
