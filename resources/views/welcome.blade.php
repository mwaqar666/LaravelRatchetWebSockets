<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel WebSocket Example</title>
    </head>
    <body>
        <button onclick="websocket.send('Hello World')">Send Hello World</button>
        <script>
            const websocket = window.websocket = new WebSocket("ws://localhost:6001/");
            websocket.onopen = data => console.log('Connection opened: ', data);
            websocket.onclose = data => console.log('Connection closed: ', data);
            websocket.onmessage = data => console.log('Connection message: ', data);
        </script>
    </body>
</html>
