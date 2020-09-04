<?php

namespace App\Http\Controllers;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
//use Ratchet\MessageInterface;

class WebSocketController extends Controller implements /*MessageInterface*/ MessageComponentInterface
{
    private $connections = [];

    final public function onOpen(ConnectionInterface $connection): void
    {
//        $this->connections[$connection->resourceId] =
    }

    final public function onMessage(ConnectionInterface $from, string $msg): void
    {
        // TODO: Implement onMessage() method.
    }

    final public function onClose(ConnectionInterface $connection): void
    {
        // TODO: Implement onClose() method.
    }

    final public function onError(ConnectionInterface $connection, Exception $e): void
    {
        // TODO: Implement onError() method.
    }
}
