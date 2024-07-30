<?php

require_once __DIR__ . "/vendor/autoload.php";

use Basis\Nats\Client;
use Basis\Nats\Configuration;

// this is default options, you can override anyone
$configuration = new Configuration([
    'host' => 'host.docker.internal',
    'jwt' => null,
    'lang' => 'php',
    'pass' => null,
    'pedantic' => false,
    'port' => 4222,
    'reconnect' => true,
    'timeout' => 1,
    'token' => null,
    'user' => null,
    'nkey' => null,
    'verbose' => false,
    'version' => 'dev',
]);

// default delay mode is constant - first retry be in 1ms, second in 1ms, third in 1ms
$configuration->setDelay(0.001);

// linear delay mode - first retry be in 1ms, second in 2ms, third in 3ms, fourth in 4ms, etc...
$configuration->setDelay(0.001, Configuration::DELAY_LINEAR);

// exponential delay mode - first retry be in 10ms, second in 100ms, third in 1s, fourth if 10 seconds, etc...
$configuration->setDelay(0.01, Configuration::DELAY_EXPONENTIAL);

$client = new Client($configuration);

$ping = $client->ping(); // true

var_dump($ping);

