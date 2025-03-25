<?php

namespace App\Controllers;

use App\Libraries\Chat;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class Server extends BaseController
{
    public function index()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            1000
        );
        $server->run();
    }
}
