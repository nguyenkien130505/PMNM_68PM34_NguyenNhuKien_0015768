<?php
// Define base URL for all assets and routing
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/');

require_once "../app/middleware.php";
$middleware = new middleware();
$middleware->checklogin();
$app = new App();
?>