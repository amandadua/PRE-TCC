<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'intelecta');
define('DB_USER', 'root');
define('DB_PASS', 'Amanda.13');

define('APP_NAME', 'Intelecta');

// Inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>