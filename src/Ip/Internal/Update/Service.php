<?php
/**
 * @package   ImpressPages
 */


namespace Ip\Internal\Update;


class Service
{

    public static function update()
    {
        $updateModel = new UpdateModel();
        $updateModel->prepareForUpdate();
        Model::runMigrations();
    }

    public static function migrationsAvailable()
    {
        return Model::migrationsAvailable();
    }

    public static function runMigrations()
    {
        Model::runMigrations();
    }
}
