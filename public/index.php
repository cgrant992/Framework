<?php declare(strict_types=1);

use Caden\Framework\Http\Request;
use Caden\Framework\Http\Kernel;

define('BASE_PATH', dirname(__DIR__));

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobals();
$kernel = new Kernel;
$response = $kernel->handle($request);

$response->send();