## Project Configuration

- Run `composer install`
- Copy and create [.env](.env) file from [.env.example](.env.example)
- Run `php artisan key:generate`
- Run `php artisan websocket:init`
- Navigate to root URL and open console
- Now if you open another browser and navigate to same URL, you'll see the connection event firing at every connection
- You can press the **Send Hello World** button in DOM to send data to other clients
- To explore the code, start from [WebSocketServer.php](app/Console/Commands/WebSocketServer.php) file
