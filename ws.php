<?php
require_once 'vendor/autoload.php';

use Ratchet\WebSocket\WsServer;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;

    $ws = new WsServer(new Chat());

    // Make sure you're running this as root
    $server = IoServer::factory(new HttpServer($ws), 4000);
    $server->run();