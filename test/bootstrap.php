<?php
session_start();

require '../vendor/autoload.php';
require '../config.php';

// setting test database
$db_setting = array(
    'driver'   => 'sqlite',
    // using in memory database
    'database' => ':memory:',
);

// assign sql for initialize test schema
define("TEST_SCHEMA_SQL", __DIR__."/../schema.sqlite3.sql");

\Base\DB::registerIlluminate($db_setting);
