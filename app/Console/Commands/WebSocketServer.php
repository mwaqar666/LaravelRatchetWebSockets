<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebSocketController;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class WebSocketServer extends Command
{
    protected $signature = 'websocket:init';

    protected $description = 'Starts a websocket server to receive and manage connections';

    final public function handle(): void
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketController
                )
            )
        );
    }
}
