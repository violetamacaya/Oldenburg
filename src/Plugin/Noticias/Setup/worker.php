<?php

namespace Plugin\Noticias\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate()
    {

        $sql = '
		CREATE TABLE IF NOT EXISTS
		   ' . ipTable('noticias') . '
		(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`row_number` double DEFAULT 0,
			`image` varchar(255),
			`abstract` text,
			`text` text,
			`date` timestamp,
			`creation_date` timestamp DEFAULT CURRENT_TIMESTAMP,
			`title` varchar(255),
			`link` varchar(255),
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