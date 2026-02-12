<?php

$DB_HOST = 'localhost';
$DB_USER = 'u852886994_mandara';
$DB_PASS = 'Mandara2023';
$DB_NAME = 'u852886994_mandara';

try {
	$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}", $DB_USER, $DB_PASS);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}

