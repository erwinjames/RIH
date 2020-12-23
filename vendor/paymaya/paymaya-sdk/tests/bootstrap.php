<?php

$loader = require dirname(__DIR__) . '/sample/autoload.php';
// $loader->add('PayMaya\\Test', __DIR__);

require __DIR__ . "/../sample/autoload.php";
use PayMaya\PayMayaSDK;

PayMayaSDK::getInstance()->initCheckout("pk-lNAUk1jk7VPnf7koOT1uoGJoZJjmAxrbjpj6urB8EIA", 
										"sk-fzukI3GXrzNIUyvXY3n16cji8VTJITfzylz5o5QzZMC", 
										"SANDBOX");

error_reporting(E_ALL);
ini_set('display_errors', '1');

