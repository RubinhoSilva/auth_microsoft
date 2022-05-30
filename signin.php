<?php
session_start();

require "vendor/autoload.php";
use myPHPnotes\Microsoft\Auth;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$tenant = "common";
$client_id = $_ENV['CLIENT_ID'];
$client_secret = $_ENV['CLIENTE_SECRET'];
$callback = $_ENV['CALLBACK'];
$scopes = ["User.Read"];


$microsoft = new Auth($tenant, $client_id, $client_secret,$callback, $scopes);

header("location: " . $microsoft->getAuthUrl());