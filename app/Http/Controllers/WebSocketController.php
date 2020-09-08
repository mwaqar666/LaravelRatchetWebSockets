<?php

namespace App\Http\Controllers;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WebSocketController extends Controller implements MessageComponentInterface
{
    private $connections = [];

    final public function onOpen(ConnectionInterface $connection): void
    {
        $connectedId = $connection->resourceId;

        $connection->send(
            json_encode(['your-connection' => $connectedId])
        );

        foreach($this->connections as $existingConnection) {
            $existingConnection['connection']->send(
                json_encode(
                    compact('connectedId')
                )
            );
        }

        $this->connections[$connectedId] = compact('connection');
    }

    final public function onMessage(ConnectionInterface $connection, $message): void
    {
        $fromId = $connection->resourceId;

        foreach ($this->connections as $resourceId => $existingConnection) {
            if ($fromId !== $resourceId) {
                $existingConnection['connection']->send(
                    json_encode(
                        ['data' => compact('fromId', 'message')]
                    )
                );
            }
        }
    }

    final public function onClose(ConnectionInterface $connection): void
    {
        $disconnectedId = $connection->resourceId;

        $connection->send(
            json_encode(['your-connection' => $disconnectedId])
        );

        unset($this->connections[$disconnectedId]);

        foreach($this->connections as $existingConnection) {
            $existingConnection['connection']->send(
                json_encode(
                    compact('disconnectedId')
                )
            );
        }
    }

    final public function onError(ConnectionInterface $connection, Exception $e): void
    {
        $errorId = $connection->resourceId;
        unset($this->connections[$errorId]);
        $connection->close();
    }
}
