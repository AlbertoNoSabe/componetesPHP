<?php

use Alberto\AccessHandler;
use Alberto\SessionManager;
use Alberto\Authenticator;
use Alberto\SessionArrayDriver;

require __DIR__ . '/../vendor/autoload.php';

class_alias('Alberto\AccessHandler', 'Access');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$data = array(
    'user_data' => array(
        'name' => 'Alberto',
        'role' => 'teacher'
    )
);

$driver = new SessionArrayDriver($data);
$session = new SessionManager($driver);
$auth = new Authenticator($session);
$access = new AccessHandler($auth);
