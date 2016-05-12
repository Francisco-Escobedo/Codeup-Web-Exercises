<?php 

DEFINE ('DB_HOST', '127.0.0.1');
DEFINE ('DB_NAME', 'employees');
DEFINE ('DB_USER', 'codeup');
DEFINE ('DB_PASS', 'modula');

require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";