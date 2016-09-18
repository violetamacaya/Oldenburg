<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Pedidos\Widget\Pedidos;



class Controller extends \Ip\WidgetController
{
    public function getTitle()
    {
        return "Pedidos";
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {
        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

}
