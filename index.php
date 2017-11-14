<?php
/**
 * Created by PhpStorm.
 * User: lexgorbachev
 * Date: 10.11.17
 * Time: 16:40
 */

require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/', function () {
    $class= new \app\Page();
    return $class->Run();
});

$klein->dispatch();