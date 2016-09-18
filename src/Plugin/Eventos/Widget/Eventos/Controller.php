<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Eventos\Widget\Eventos;



class Controller extends \Ip\WidgetController
{
    public function getTitle()
    {
        return "Eventos";
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {
        $sql = "SELECT * FROM ip_eventos ORDER BY date ASC";
        $data['todos'] = ipDb()->fetchAll($sql);
        $timezone = time();


        foreach($data['todos'] as $evento){
            if(strtotime($evento['date']) > $timezone){
                $data['eventos'][] = $evento;
            }
        }
        ipAddJs('assets/change_row.js');
        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

}
