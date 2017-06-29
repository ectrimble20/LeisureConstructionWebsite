<?php

namespace Leisure;

use Leisure\Application\Router;
use Leisure\Library\Log\Log;

require_once 'GlobalFunctions.php';
require_once 'BootStrap.php';
require_once 'vendor/autoload.php';

//set time-zone to prevent date warnings and set headers to allow CORS (Cross-Origin Resource Sharing)
date_default_timezone_set('America/New_York');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: text/html");

BootStrap::registerAutoLoader();
Log::Get()->debug("BootStrap Initialized");

Router::Initialize();