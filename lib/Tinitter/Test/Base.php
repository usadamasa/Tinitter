<?php

namespace Tinitter\Test;

class Base extends \PHPUnit_Framework_TestCase
{
    use \Uzulla\MockSlimClient;
    public static function registrationRoute(\Slim\Slim $app)
    {
        \Tinitter\Route::registration($app);
    }

    public static function createSlim()
    {
        return new \Slim\Slim([
            'templates.path'    => TEMPLATES_DIR_PATH,
            'view'              => new \Slim\Views\Twig(),
        ]);
    }

    protected function setUp()
    {
        // initialize databse
        $schema_sql = file_get_contents(TEST_SCHEMA_SQL);
        \Illuminate\Database\Capsule\Manager::connection()
            ->getPdo()
            ->exec($schema_sql);
    }
}
