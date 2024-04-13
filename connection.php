<?php
$db_host = 'localhost:3307'; // added port parameter "3307" to ensure applications are configured to connect to MySQL using port 3307
$db_user = 'root';
$db_pass = '';
$db_name = 'flexway_db';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($connection));
}

?>