<?php
session_start();

require "vendor/autoload.php";
use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;


$auth = new Auth(Session::get("tenant_id"), Session::get("client_id"), Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
try {
    $tokens = $auth->getToken($_REQUEST['code']);

    $accessToken = $tokens->access_token;
    $auth->setAccessToken($accessToken);
    $user = new User;

    echo "Name: "  . $user->data->getDisplayName();
    echo "<br>";
    echo "Email: " . $user->data->getUserPrincipalName();
    echo "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}