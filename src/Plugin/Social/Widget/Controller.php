<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\Social\Widget\Social;



class Controller extends \Ip\WidgetController
{
    public function getTitle()
    {
        return "Social";
    }

    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {
        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

}
