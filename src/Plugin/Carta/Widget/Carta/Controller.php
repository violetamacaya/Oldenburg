<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Carta\Widget\Carta;



class Controller extends \Ip\WidgetController
{
    public function getTitle()
    {
        return "Carta";
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {
        $data['carta'] = ipDb()->selectAll('carta', '*', array('visible' => 1));
        ipAddJs('/assets/Carta.js');
        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

}
