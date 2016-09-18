<?php

namespace Plugin\SlideShow\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS
           ' . ipTable('slideshow') . '
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
		`widgetId` int(11),
        `slideshowOrder` double,
        `title` varchar(255),
        `text` varchar(255),
        `url` varchar(255),
        `Enabled` boolean,
        `image` varchar(255),
		`lang` varchar(3),
		`itemOrder` double,
		`isVisible` int(1),
        PRIMARY KEY (`id`)
        )';

        ipDb()->execute($sql);

    }

    public function deactivate()
    {

    }

    public function remove()
    {

    }

}
