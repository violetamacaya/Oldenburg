<?php

namespace Plugin\Eventos\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate()
    {

        $sql = '
		CREATE TABLE IF NOT EXISTS
		   ' . ipTable('eventos') . '
		(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`row_number` double DEFAULT 0,
			`title` varchar(255),
			`image` varchar(255),
			`description` text,
			`date` timestamp,

			`creation_date` timestamp DEFAULT CURRENT_TIMESTAMP,
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