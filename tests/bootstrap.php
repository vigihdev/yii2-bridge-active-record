<?php

use VigihDev\SymfonyBridge\Config\ConfigBridge;

error_reporting(-1);

/** @var Composer\Autoload\ClassLoader $autoload  */
$autoload = require __DIR__ . '/../vendor/autoload.php';
ConfigBridge::boot(dirname(__DIR__));
