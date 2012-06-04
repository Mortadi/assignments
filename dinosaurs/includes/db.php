<?php

//opens a connection to the MySQL database.
//Shared between all the PHP files in our application

$user = getenv('DB_USER'); // MySQL username
$pass = getenv('DB_PASS'); // MySQL password
$data_source = getenv('DATA_SOURCE');

//PDO: PHP Data Objects
// Allows us to connect to many different kinds of databases
$db = new PDO($data_source, $user, $pass);

// Force the connection to comunicate in UTF-8
// and support many human languages

$db->exec('SET NAMES utf8');